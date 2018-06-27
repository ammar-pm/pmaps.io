<script>
  window.intercomSettings = {
    app_id: "oyrnyadw",
    @if(App::getLocale() == 'ar')
    alignment: 'left',     
    horizontal_padding: 20, 
    vertical_padding: 20,
    @endif
    @auth
    name: "{{ Auth::user()->name }}",
    email: "{{ Auth::user()->email }}",
    created_at: "{{ strtotime(Auth::user()->created_at) }}",
    team_id: "{{ Auth::user()->currentTeam()->id }}",
    team_name: "{{ Auth::user()->currentTeam()->name }}",
    @endauth
  };
</script>
<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/oyrnyadw';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>