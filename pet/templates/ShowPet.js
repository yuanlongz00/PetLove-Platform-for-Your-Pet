const ShowPet = (data) => {
          
    const PetItem = (petdata)=>{
        return(`
            <div class="col-md-2 petitem" onclick="getDetail(${petdata.id})">
            
              <img src="${petdata.img_url}" class="card-img-top" style="height:150px;"/>
                   
              <h3 class="card-title">${petdata.name}</h3>
              <h6 class="card-subtitle">${petdata.type}</h6>
              <p style="margin-bottom:0px">Owner: ${petdata.owner}</p>
              <p>Phone: ${petdata.phone}</p>
                    
            </div>
        `)
    }

    return(`
    
        <div class="row">  
            ${
                data.map((item, index) => {
                    
                    return (`${PetItem(item)}`)
                    
                }).join('')
            }      
        </div>
            
    `)

}

const getDetail = (id)=>{
      //     $.getJSON('./php/getDetail.php?id='+id, function(res){
      //               console.log(res);
      //               // console.log($("#petlist"))
      //               $("#petlist").empty();
      //               $("#petlist").append(`${ShowDetail(res.data[0])}`);
      //     })
      location.href = "../php/getDetail.php?id="+id;
    }