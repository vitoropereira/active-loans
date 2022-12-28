<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class GetB3DataController extends Controller
{
    public function index(Request $request)
    {
        $client = new PendingRequest();
        $response = $client->get('https://arquivos.b3.com.br/api/download/requestname?fileName=LendingOpenPositionFile&date=2022-12-26');
        $data = $response->json();
        $responseArquivo = $client->get("https://arquivos.b3.com.br/api/download/?token=" . $data['token']);

        $dataArquivo =  $responseArquivo->body();

        $lineArquivo = explode("\n", $dataArquivo);

        $arquivo = fopen('arquivo30.csv', 'w');

        foreach ($lineArquivo as $linha) {
            $row = explode(';', $linha);
            fputcsv($arquivo, $row, ';');
        }

        fclose($arquivo);

        return Inertia::render('DataB3', [
            'status' => 'esta tudo ok',
        ]);
    }
}
