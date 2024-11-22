<?php include("Template/Header.php"); ?>
<?php 

session_start();

print_r($_SESSION);

?>

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              
            
              <div class="col-lg-5">

                <div class="card bg-secondary text-white rounded-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Card details</h5>
                    </div>

                    <form class="mt-4">

                      <div id="paypal-button-container"></div>
                    
                    <script>
                                            
                      paypal.Buttons({
                        style: {
                          layout: 'vertical',
                          color:  'gold',
                          shape:  'rect',
                          label:  'paypal'
                        },


                        createOrder: function(data, actions){
                          return actions.order.create({
                            purchase_units: [{
                              amount: {
                                value: 100
                              }
                            }]
                          })
                        },

                        onApprove: function(data, actions){
                          actions.order.capture().then(function (detalles){
                            window.location.href="index.php";
                          });
                        },

                      onCancel: function(data){
                        alert("Pago Canceladó...!")
                        console.log(data);
                      }

                      }).render('#paypal-button-container');

                    </script>
                    

                    </form>

                  </div>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php include("Template/footer.php"); ?>