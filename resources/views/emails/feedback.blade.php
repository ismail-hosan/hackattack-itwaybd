<p>{{ __('Hello, Administrator.') }}</p>
  <br />
  <p>
    <span>{{ __('I am ') }}</span>
    <strong>{{ $name . '.' }}</strong>
    <span>{{ __('I wanna ask you about ') }}</span>
    <strong>{{ $subject . '.' }}</strong>
  </p>
  <br />
  <p>
    <strong>{{ __('Message') }}</strong>
    <br />
    <span class="text-justify" style="text-align: justify !important;">{{ $description }}</span>
  </p>
  <br />
  <p>
    <span>{{ __('You can send reply a email in my email address. My email address is : ') }}</span>
    <b style="text-decoration: underline !important;">{{ $email }}</b>
  </p>
  <br />
  <br />
  <br />
  <p>{{ __('Warm Regards') }}</p>
  <p>
    <strong>{{ strtoupper($name) }}</strong>
  </p>
