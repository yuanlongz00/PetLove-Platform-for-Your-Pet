const DeleteForm = () =>{
          return(`
          <form action="../php/delete.php" method="GET" class="form-pet">
          <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-3 col-form-label">ID</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" name="id">
              </div>
          </div>
          
          
          <button type="submit" class="btn btn-primary">Delete</button>
      </form>
          `)
}