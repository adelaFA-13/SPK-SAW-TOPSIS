<header class="text-center">
      <h1>
        Sistem Pendukung Keputusan
        <br />
        Pemilihan Agent Travel Haji & Umrah
        <br/>
        Di Kota Palembang
      </h1>
      <p class="mt-3">
        You will see beautiful
        <br />
        moment you never see before
      </p>
      <!-- <a href="index.php?url=Halaman_Pencarian" class="btn btn-get-started px-4 mt-4">
        Get Started
      </a> -->
    </header>
    <main>
      <div class="container">
        <section class="section-stats row justify-content-center" id="stats">
          <div class="col-3 col-md-2 stats-detail" align=center>
          
            <h2><?php echo getJmlhHaji();?></h>
            <p>Paket Haji</p>
          </div>
          <div class="col-3 col-md-2 stats-detail" align=center>
            <h2><?php echo getJmlhUmrah();?></h2>
            <p>Paket Umrah</p>
          </div>
          <div class="col-3 col-md-2 stats-detail"  align=center>
            <h2><?php echo getJmlhTravel() ?></h2>
            <p>Agent Travel</p>
          </div>
        </section>
      </div>
      <section class="section-popular" id="popular">
        <div class="container">
          <div class="row">
            <div class="col text-center section-popular-heading">
              <h2>Let's find your preferrend travel agent </h2>
              <p>
      
              </p>
              
            </div>
          </div>
        </div>
      </section>
      <section class="section-popular-content" id="popularContent">
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-travel text-center d-flex flex-column"
                style="background-image: url('Asset3/images/logo-haji.jpg');"
              >
                <div class="travel-country"></div>
                <div class="travel-location">HAJI</div>
                <div class="travel-button mt-auto">
                  <a href="index.php?url=Halaman_Pencarian_Haji_member" class="btn btn-travel-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div
                class="card-travel text-center d-flex flex-column"
                style="background-image: url('Asset3/images/logo-mekkah.jpg');"
              >
                <div class="travel-country"></div>
                <div class="travel-location">UMRAH</div>
                <div class="travel-button mt-auto">
                  <a  href="index.php?url=Halaman_Pencarian_Umrah_member"" class="btn btn-travel-details px-4">
                    View Details
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-networks" id="networks">
        <div class="container">
          <div class="row">
           
          </div>
        </div>
      </section>
      <section class="section-testimonials-heading" id="testimonialsHeading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>Anda mempunyai Agent Travel Haji dan Umrah ?</h2>
              <p>
                Moments were giving them
                <br />
                the best experience
              </p>
              <a href="register_travel.php" class="btn btn-warning px-4 mt-4">
                Get Started
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>
