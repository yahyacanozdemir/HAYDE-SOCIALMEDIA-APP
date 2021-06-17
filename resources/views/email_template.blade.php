<p>Merhaba, <b>{{ $emails['name'] }} !</b> <br/>Hayde Hoşgeldin ! </p>
<p>{{ $emails['message'] }}.</p>
<a href="http://127.0.0.1:8000/verify?code={{ $emails['verificationcode']}}">Tıkla ve Doğrula</a>