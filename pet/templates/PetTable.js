const PetTable = (data) =>{
          return(`
                    <table class="table table-striped table-hover">
                              <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Owner</th>
                                        <th scope="col">Phone</th>
                                        </tr>
                              </thead>

                              <tbody>
                                        ${
                                                  data.map((item, index)=>{
                                                            return(`
                                                                      <tr>
                                                                                <td>${item.id}</td>
                                                                                <td>${item.name}</td>
                                                                                <td>${item.type}</td>
                                                                                <td>${item.sex}</td>
                                                                                <td>${item.age}</td>
                                                                                <td>${item.owner}</td>
                                                                                <td>${item.phone}</td>
                                                                      <tr>
                                                            `)
                                                  }).join('')
                                        }
                              </tbody>
                    </table>
          `)
}