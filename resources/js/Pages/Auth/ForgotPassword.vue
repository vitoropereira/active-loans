<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm, Link } from '@inertiajs/inertia-vue3';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>

        <Head title="Forgot Password" />

        <div class="mb-4 text-sm text-gray-600">
            Esqueceu sua senha? Sem problemas. 😁 <br>
            Basta nos informar seu endereço de e-mail e enviaremos um e-mail
            com um link de redefinição de senha que permitirá que você escolha um novo.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <Link href="/">
                Voltar
                </Link>
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    E-mail para reiniciar a senha
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
