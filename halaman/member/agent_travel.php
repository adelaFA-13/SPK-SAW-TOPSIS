
<main>
      <section class="section-details-header"></section>
      <section class="section-details-content">
        <div class="container">
          <!-- <div class="row">
            <div class="col p-0">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item" aria-current="page">
                    Paket Travel
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Details
                  </li>
                </ol>
              </nav>
            </div>
          </div> -->
          <div class="row">
              <div class="col-lg-12 pl-lg-0">
                <div class="card card-details mb-3">
                  <h1>Daftar Agent Travel</h1>
                  <p>
                    
                  </p>
                  <div class="attendee">
                  <div class="table-responsive">
                    <table class="table table-responsive-sm text-center" id="dataTable" cellspacing="0">
                      <thead>
                        <tr>
                          <td scope="col" width="10">No</td>
                          <td scope="col"></td>
                          <td scope="col">Nama Agent Travel</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i=1;
                        $a = "config/agent/".$data['foto'];
                        if(!isset($data)):
                          foreach($datas as $data):
                        ?>
                        <tr>
                          <td><?php echo $i++;?>
                          </td>
                          <?php 
                          if(empty(file_exists($a)))
                            {?>
                             <td class="align-middle"><img src="img/undraw_posting_photo.svg" width="150" class="img-profile rounded-circle text-center mx-auto" alt="Foto"></td>
                            <?php
                            }else{
                            ?>
                            <td class="align-middle"><img src=<?php echo "config/agent/".$data['foto']; ?>  width="150" class="img-profile rounded-circle text-center mx-auto" alt="Foto"></td>
                           </td><?php                           
                            }                          
                          ?>
                          <td class="align-middle"><a href="index.php?url=Agent_detail&id=<?php echo $data['travel_id'];?>"><?php echo $data['nama']?></a></td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                  ?>
                      </tbody>
                    </table>
                  </div>
                  </div>
                  <div class="member mt-3">
                    <h3 class="mt-2 mb-0">Note</h3>
                    <p class="disclaimer mb-0">
                      You are only able to invite member that has registered in
                      Nomads.
                    </p>
                  </div>
                </div>
              </div>
              <!-- masukan Nilai bobot-->
        </div>
      </section>
    </main>