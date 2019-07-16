(function ($) {

    var grabedurl = window.location.pathname;
    var url = '/api' + grabedurl;
    var no = 1;
    //get 1 article by slug
    $.ajax({
        url: url,
        dataType: "json",
        success: function (getdata) {
            $.each(getdata.data, function (key, value) {
                $("#article-category").append(
                    `
                    <div class="col-12 col-lg-6">
                            <div class="single-blog-post style-3">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <a href="#"><img src="/assets/img/fotoartikel/${value.foto}" alt=""></a>
                                </div>
                                <!-- Post Data -->
                                <div class="post-data">
                                    <a href="/blog-kategori/${value.kategori.slug}" class="post-catagory cat-3">${value.kategori.nama_kategori}</a>
                                    <a href="/blog/${value.slug}" class="post-title">
                                        <h6>${value.judul}</h6>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-author">By <a href="#">${value.user.name}</a></p>
                                        <p class="post-date">5 Hours Ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                );
            });
            console.log(getdata);
            console.log(url);
        }

    });
})(jQuery);
