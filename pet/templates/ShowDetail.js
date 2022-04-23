const ShowDetail = (data)=>{
          console.log("detail")
          return(`
                    <div class="row" style="margin-top:40px;margin-bottom:30px;">
                              <div class="col-md-6">
                                        <img src="./images/${data.img_url}" alt="" style="width:100%;" />
                              </div>
                              <div class="col-md-6 detail">
                                        <h2>${data.name}</h2>
                                        <p>Type:  ${data.type}</p>
                                        <p>Color:  ${data.color}</p>
                                        <p>Age:  ${data.age}</p>
                                        <p>Sex:  ${data.sex}</p>
                                        <p>Owner:  ${data.owner}</p>
                                        <p>Phone:  ${data.phone}</p>
                              </div>
                    </div>
                    <p style="font-size:larger;">&nbsp;&nbsp;&nbsp;&nbsp;${data.detail}</p>
                    <hr>
                    <form action="">
                              <div class="row">
                                        <div class="col-md-8">
                                                  <input type="text" name="comment" placeholder="Comments here" class="form-control"/>
                                        </div>

                                        <div class="col-md-4">
                                                  <input type="submit" value="Comment" class="btn btn-primary" />
                                        </div>
                              </div>

                    </form>
          `)
}