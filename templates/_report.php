<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="report">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Infringement Report Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <p>At Lemu, we aim to provide our sellers and our customers with a safe and trusted e-commerce platform.<br> Please provide the information requested below, to enable us to address your report.</p><br>
            <form method="post">
                <input type="text" name="Fullname" placeholder="Fullname" class="form-control py-2 mb-2">
                <input type="email" name="Email" placeholder="Email Address" class="form-control py-2 mb-2">
                <input type="text" name="Number" placeholder="Phone Number" class="form-control py-2 mb-2">
                <label for="sel2">Reason for Reporting</label>
            <select multiple class="form-control py-2 mb-2" id="sel2" name="sellist2">
                <option>Product appears to be counterfeit</option>
                <option>Product description containa inappropriate content</option>
                <option>Product description appears to be wrong or misleading information</option>
                <option>Product may be prohibited or banned by law</option>
            </select>
                <input type="text" name="link" placeholder="Product Link" class="form-control py-2 mb-2">
                <textarea rows="5" placeholder="Additional Details" class="form-control py-2 mb-2"></textarea>
                
                </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        	 <button class="btn btn-success" data-dismiss="modal"> Submit </button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>