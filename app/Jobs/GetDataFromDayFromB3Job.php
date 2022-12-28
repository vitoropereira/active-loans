<?php

namespace App\Jobs;

use App\Models\DateHasAlreadyBeenTaken;
use App\Models\LendingOpenPosition;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GetDataFromDayFromB3Job implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public $date
    ) {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new PendingRequest();
        // TODO: LEVAR O CODIGO PARA O JOB.
        // TODO: CRIAR UM COMMANDS OU FAZER O JOB RODAR AUTOMATICO.

        $response = $client->get('https://arquivos.b3.com.br/api/download/requestname?fileName=LendingOpenPositionFile&date=' . $this->date);
        $data = $response->json();

        $responseArquivo = $client->get("https://arquivos.b3.com.br/api/download/?token=" . $data['token']);
        $dataArquivo =  $responseArquivo->body();

        $lineArquivo = explode("\n", $dataArquivo);

        foreach ($lineArquivo as $key => $linha) {
            if ($key != 0) {

                $row = explode(';', $linha);

                $lendingOpenPosition = new LendingOpenPosition();
                $lendingOpenPosition->RptDt = !isset($row[0]) ? '' : $row[0];
                $lendingOpenPosition->TckrSymb =  !isset($row[1]) ? '' : $row[1];
                $lendingOpenPosition->ISIN =  !isset($row[2]) ? '' : $row[2];
                $lendingOpenPosition->Asst =  !isset($row[3]) ? '' : $row[3];
                $lendingOpenPosition->BalQty =  !isset($row[4]) ? '' : $row[4];
                $lendingOpenPosition->TradAvrgPric =  !isset($row[5]) ? '' : $row[5];
                $lendingOpenPosition->PricFctr =  !isset($row[6]) ? '' : $row[6];
                $lendingOpenPosition->BalVal =  !isset($row[7]) ? '' : $row[7];

                $lendingOpenPosition->save();
            }
        }

        $dateHasAlreadyBeenTaken = new DateHasAlreadyBeenTaken();
        $dateHasAlreadyBeenTaken->date = $this->date;
        $dateHasAlreadyBeenTaken->save();
    }
}
