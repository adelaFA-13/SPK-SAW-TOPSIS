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
              <div class="col-lg-8 pl-lg-0">
                <div class="card card-details mb-3">
                  <h1>Hasil Mesin Pencarian Travel Agent Perjalanan Haji</h1>
                  <p>
                    Ini merupakan hasil pencarian dari nilai prioritas kriteria yang anda masukan
                  </p>
                  <div class="attendee">
                    <table class="table table-responsive-sm text-center">
                      <thead>
                        <tr>
                          <td scope="col">No</td>
                          <td scope="col">Nama Paket</td>
                          <td scope="col">Agent Travel</td>
                          <td scope="col">Visa</td>
                          <td scope="col">Passport</td>
                          <td scope="col"></td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <img
                              src="assets/images/avatar-4.png"
                              alt=""
                              height="60"
                            />
                          </td>
                          <td class="align-middle">Angga Risky</td>
                          <td class="align-middle">CN</td>
                          <td class="align-middle">N/A</td>
                          <td class="align-middle">Active</td>
                          <td class="align-middle">
                            <a href="#">
                              <img src="assets/images/ic_remove.png" alt="" />
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img
                              src="assets/images/avatar-5.png"
                              alt=""
                              height="60"
                            />
                          </td>
                          <td class="align-middle">Galih Pratama</td>
                          <td class="align-middle">SG</td>
                          <td class="align-middle">30 Days</td>
                          <td class="align-middle">Active</td>
                          <td class="align-middle">
                            <a href="#">
                              <img src="assets/images/ic_remove.png" alt="" />
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="member mt-3">
                    <h3 class="mt-2 mb-0">Note</h3>
                    <p class="disclaimer mb-0">
                     Nilai 5 = Sangat Penting </br>
                     Nilai 4 = Penting </br>
                     Nilai 3 = Normal </br>
                     Nilai 2 = Tidak Penting </br>
                     Nilai 1 = Sangat Tidak Penting </br>
                    </p>
                  </div>
                </div>
              </div>
              <!-- masukan Nilai bobot-->
              <div class="col-lg-4">
                <div class="card card-details">
                  <h3>Silahkan masukan nilai prioritas kriteria pencarian anda:</h3>
                  <form action="config/pencarian/perhitungan_haji.php" method="POST">
                  <table class="trip-informations">
                    <tr>
                      <th width="50%">Harga</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_harga" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Paket</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_paket" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Keamanan</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_keamanan" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Fasilitas</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_fasilitas" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Pelayanan</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_pelayanan" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Sertifikat</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_sertifikat" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <th width="50%">Testimoni</th>
                      <td width="50%" class="text-right">
                      <select name="bobot_testimoni" id="" class="btn btn-block-xs ">
                          <option value="">--Pilih--</option>
                          <option value="5">5</option>
                          <option value="4">4</option>
                          <option value="3">3</option>
                          <option value="2">2</option>
                          <option value="1">1</option>
                        </select>
                      </td>
                    </tr>
                    <!-- <tr>
                      <th width="50%">Total (+Unique)</th>
                      <td width="50%" class="text-right text-total">
                        <span class="text-blue">$ 279,</span
                        ><span class="text-orange">33</span>
                      </td>
                    </tr> -->
                  </table>
                    
                  <hr />
                <div class="join-container">
                  <input type="submit" class="btn btn-block btn-join-now mt-3 py-2"
                    ></input>
                </div>
                </form>
                <div class="text-center mt-3">
                  <a href="#" class="text-muted">Cancel</a>
                </div>
              </div>
            </div>
        </div>
      </section>
    </main>