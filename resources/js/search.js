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
                    $(".posts").remove();
                    // console.log(response);
                    response['status'].forEach(element => {
                        $('#posts').append(`
                        <div class="col-sm-6 col-md-4 mt-3 d-inline-flex posts">
                            <article class="card mb-4 border-right-0 border-left-0 border-top-0 bg-dark text-white">
                                <header class="py-md-3 px-md-4">
                                    <p class="mb-2">
                                        <span class=""> ${element['created_at']}</span>
                                    </p>
                                    <a href="#">
                                        <h4 class="card-title text-white "> ${element['title']}</h4>
                                    </a>
                                </header>
                                <a href="#">
                                    <img class="card-img" src="https://images.unsplash.com/photo-1502726488490-f99c74217a37?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=d156ca94ceff848e0bd0c15894bebb5e" alt="">
                                </a>
                                <div class="card-body  ">
                                    <p class="card-text"> ${element['content']}</p>
                                </div>
                            </article>
                    </div>`);
                    });
                })
                .fail(function (response) {
                    alert("ERROR");
                });
            }else{
                window.location.reload();
            }
        });