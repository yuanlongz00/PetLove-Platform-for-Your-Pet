const UpdateForm = () =>{
          return(`
          <form action="../php/update.php" method="POST" class="form-pet">
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" name="id">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" name="name">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Type</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputPassword3" name="type">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Sex</label>
              <div class="col-sm-9" >
                    <select class="form-select" aria-label="Default select example" id="sex" name="sex">
                          <option selected value="male">Male</option>
                          <option value="female">Female</option>  
                    </select>
                 
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">age</label>
              <div class="col-sm-9">
                     <input type="text" class="form-control" id="inputPassword3" name="age">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">color</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputPassword3" name="color">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Owner</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputPassword3" name="owner">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Phone</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputPassword3" name="phone">
              </div>
          </div>
          <div class="row mb-3">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputPassword3" name="detail">
              </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
          `)
}