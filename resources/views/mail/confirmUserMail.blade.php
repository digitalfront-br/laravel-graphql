
@component('mail::message')
<p>Parabéns {{ $user->name }}</p>
<p>Você acaba de dar um passo na direção de se tornar um couch de alta performance.</p>
<p>Para continuar clique no botão abaixo para confirmar seu endereço de email e validar seu cadastro.</p>

@component('mail::button', ['url' =>  'http://localhost:8000' . '/mail/2$2y$10$erEGRcc3sg4emN7snHtg' . $user->id . 'Su.5XpWTHHV3EIRcvZ6qum657yo76aoh6', 'bg' => '#7367F0'])
{{ __('Confirmar email') }}
@endcomponent
@endcomponent
