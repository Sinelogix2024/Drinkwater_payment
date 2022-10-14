<style>
    figure img {
        height: 150px;
    }

</style>

<figure class="logo">
    <a href="{{ url('/home', ['detail_access_token' => request()->detail_access_token]) }}"><img src="{{ asset('images/logowater.png') }}" alt="Logo" /></a>
    @php
    $advocateLinkType = 'droplet';
    $advocateFirstName = null;
    $advocateLastName = null;

    if (!empty(request()->detail_access_token)) {
    $advToken = request()->detail_access_token;
    $advocateData = App\Models\Advocate::where('adv_detail_access_token', $advToken)->first();
    $advocateFirstName = $advocateData->adv_first_name;
    $advocateLastName = $advocateData->adv_last_name;
    $advocateLinkType = $advocateData->link_type;
    }
    @endphp
    @switch($advocateLinkType)
    @case('droplet-name')
    <span style="font-size: 35px;">+</span>
    <span class="brand_txt" style="font-size: 8vw !important;">{{ $advocateFirstName }} {{ $advocateLastName }}</span>
    @break
    @case('droplet-logo')
    <span style="font-size: 35px;">+</span>
    <img src="{{ asset('images').'/'.$advocateData->logo_url }}" alt="Logo" />
    @break
    @default
    @endswitch
</figure>
