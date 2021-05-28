var posts = $("#posts").html();
const search = document.getElementById('search');
        search.addEventListener('input', ()=>{
            if(search.value != ''){
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
               $.ajax({
                    method: "POST",
                    url: '/search',
                    data: { search: search.value }
                })
                .done(function(response) {
                    $("#posts").empty();
                    // console.log(response);
                    response['status'].forEach(element => {
                        // console.log(element['title'])
                        $("#posts").append(`
                        <div class="col mt-5">
                            <div class="card h-100 bg-secondary text-white ">
                                <img src="https://drive.google.com/uc?id=${element['path_img']}&export=media  " class="card-img-top" alt="${element['path_img']} ">
                                <div class="card-body">
                                    <h5 class="card-title">${element['title']}</h5>
                                    <p class="card-text">${element['content']}</p> 
                                </div>
                                <div class="card-footer">
                                    <small class="text-white">${element['created_at']}</small>
                                </div>
                            </div>
                        </div>
                        `);
                        // let posts = $('#posts').innerHTML;
                        // console.log(posts);
                    });
                })
                .fail(function (response) {
                    alert("ERROR");
                });
            }else{
                $("#posts").html(posts);
                console.log(posts)
            }
        });