<form action="{{ route('suspend-license-key')}}" method="POST">
    @csrf
    <input type="text" name="licenseKey">
    <button type="submit">Suspend License Key</button>
</form>
