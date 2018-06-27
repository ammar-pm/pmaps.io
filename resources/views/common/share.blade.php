<span id="share"></span> 


@push('plugins')
<link rel="stylesheet" href="/vendor/jssocials-1.4.0/jssocials.css">
<link rel="stylesheet" href="/vendor/jssocials-1.4.0/jssocials-theme-minima.css">
<script src="/vendor/jssocials-1.4.0/jssocials.min.js"></script>

<script>
    //Share
    $("#share").jsSocials({
      showLabel: false,
      showCount: true,
      shareIn: "popup",
      shares: ["email", "twitter", "facebook"]
     });
</script>
@endpush


