@extends('landing.layout')
@section('content')

  <!-- PLANS SECTION -->
  <div class="pricing-table p-0">
    <div class="container">
      <div class="row">       

      <div class="col-md-12 text-center p-0">
          <h2 class="lead">Make your projects impactful</h2> 
          <p class="lead">A toolkit for organizations working towards a sustainable future</p>
      </div>

      </div>
      <!--Row-->

      <div class="row pt-0">

        <div class="col-sm-6 col-md-4 pricing-table pricing-table-second">
          <div>
            <span class="pricing-icon ion-social-bitcoin-outline"></span>
            <span class="pricing-user"><strong>PRIVATE SECTOR</strong></span>
            <br>
            <p class="lead">Ideal for identifying optimal locations for an expansion project or new endeavor with maps highlighting restrictions, land price, ownership, and access to infrastructure.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 pricing-table pricing-table-second">
          <div>
            <span class="pricing-icon ion-ios-people-outline"></span>
            <span class="pricing-user"><strong>NGOs</strong></span>
            <br>
            <p class="lead">Ideal for understanding correlations between various data sets such as the crucial Water-Energy-Food nexus. Challenges and development opportunities are highlighted in each sector at every level.</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 pricing-table pricing-table-second">
          <div>
            <span class="pricing-icon ion-network"></span>
            <span class="pricing-user"><strong>GOVERNMENT</strong></span>
            <br>
            <p class="lead">The Palestinian Authority can collaborate on shared files, sync folders of information across teams and apply folder permissions allowing for seamless and secure data dissemenation.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /PLANS SECTION -->



  <!-- IMAGE RIGHT SECTION -->
  <div class="image-right" id="explore">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">

          <h2 class="lead">Informed policy and business decisions</h2>
          <p>Know what really drives the Palestinian economy. Intuitively understand key insights to inform and drive development projects.</p>
          <a href="/register">Get Started</a>
        </div>

        <div class="col-sm-6 image">
<div class="marvel-device iphone5s gold">
    <div class="top-bar"></div>
    <div class="sleep"></div>
    <div class="volume"></div>
    <div class="camera"></div>
    <div class="sensor"></div>
    <div class="speaker"></div>
    <div class="screen">
         <iframe width="98%" height="520" frameborder="0" src="{{ Config::get('featured_map') }}" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
    </div>
    <div class="home"></div>
    <div class="bottom-bar"></div>
</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /IMAGE RIGHT SECTION -->


  <!-- BUTTON SECTION -->
  <div class="button">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <span><strong>What really drives the Palestinian economy?</strong> </span><a href="/register">Get answers <i class="ion-arrow-right-c"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- /BUTTON SECTION -->

  <!-- SECTORS SECTION #1 -->
  <div class="features-1" id="sectors">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="lead">Strategic economic sectors</h2>
          <p class="lead">Covering the range of the Palestinian economy</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="row text-center icons">


          @foreach($categories as $category)

          <div class="col-md-6">
           
            @if(!empty($category->icon))
            <p><img src="/storage/icons/{{ $category->icon }}" alt="{{ $category->title }}" width="62"></p>
            @endif

            <h3>{{ $category->title }}</h3>
          </div>

          @endforeach

          </div>
          
        </div>
        <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-0">
          <div class="color-block">
            <p>Use PMaps's powerful features and unique datasets to:</p>
            <ul>
              <li>Forecast future Palestinian needs</li>
              <li>Analyze current land usage and market trends</li>
              <li>Visualize population growth and distribution</li>
              <li>Plan and design infrastructure projects</li>
            </ul>
            <a href="/contact" class="scroll">Talk to our team</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /SECTORS SECTION #1 -->


  <!-- INFO BOX SECTION -->
  <div class="info-box">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 box">
          <div class="row">
            <div class="col-sm-6 left">
                <span>Curated data from Palestinian Institutions</span>
                <p>PMaps provides eligible NGOs with otherwise hard to get data from a range of Palestinian ministries.</p>
            </div>  
            <div class="col-sm-6">
              <div class="row library-carousel">

                  <div class="library-carousel-item text-center">
                    <center><img src="/landing/img/pna-logo.png" width="80"></center>
                    <span>Palestinian Central Bureau of Statistics<br>
                    الجهاز المركزي للاحصاء الفلسطيني</span>
                  </div>

                  <div class="library-carousel-item text-center">
                    <center><img src="/landing/img/pna-logo.png" width="80"></center>
                    <span>Ministry of Local Government<br>
                    وزارة الحكم المحلي</span>
                  </div>

                  <div class="library-carousel-item text-center">
                    <center><img src="/landing/img/pna-logo.png" width="80"></center>
                    <span>Ministry of Agriculture<br>
                    وزارة الزراعة</span>
                  </div>

                  <div class="library-carousel-item text-center">
                    <center><img src="/landing/img/pna-logo.png" width="80"></center>
                    <span>Energy and Natural Resources Authority<br>
                    سلطة الطاقة والموارد الطبيعية</span>
                  </div>

                  <div class="library-carousel-item text-center">
                    <center><img src="/landing/img/pna-logo.png" width="80"></center>
                    <span>Water Authority<br>
                    سلطة المياه</span>
                  </div>
  
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /INFO BOX SECTION -->
  



  <!-- PANELS SECTION -->
  <div class="panels" id="features">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2 class="lead">A Maps and Data Hub</h2>
          <p class="lead">Simple for any user, serious power under the hood for professionals.</p>
        </div>
      </div>
      <div class="row panels-carousel">
        <div class="panel">
          <i class="material-icons text-primary">map</i>
          <span>Maps</span>
          <p>Create, design and integrate high resolution maps with our unique datasets.</p>
        </div>
        <div class="panel">
          <i class="material-icons text-primary">data_usage</i>
          <span>Data</span>
          <p>Bring your own data, upload any kind of data and visualize instantly into your chosen maps.</p>
        </div>
        <div class="panel">
          <i class="material-icons text-primary">layers</i>
          <span>Layers</span>
          <p>Choose from our custom aerial layers, publicly available layers or upload your own for cloud processing.</p>
        </div>
        
        <div class="panel">
          <i class="material-icons text-primary">search</i>
          <span>Search</span>
          <p>Instantly search any data from any time period, searching maps has never been so easy.</p>
        </div>
        
        <div class="panel">
          <i class="material-icons text-primary">settings</i>
          <span>Enterprise Features</span>
          <p>Built with enterprise needs in mind, manage teams, users, global settings and more.</p>
        </div>
        
      </div>
    </div>
  </div>
  <!-- /PANELS SECTION -->

@endsection