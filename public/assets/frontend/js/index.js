(function ($) {
    var browserWindow = $(window);
    var url = "/api/front";
    var no = 1;
    //get list article
    $.ajax({
        url: url,
        dataType: "json",
        success: function (getdata) {
            $.each(getdata.data.artikel, function (key, value) {
                $("#article-post").append(
                    `
                    <div class="col-12 col-lg-6">
                        <div class="single-blog-post style-3">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="#"><img src="${value.foto}" style="width:290px; height:215px;" alt=""></a>
                            </div>
                            <!-- Post Data -->
                            <div class="post-data">
                                <a href="/kategori/${value.kategori.slug}" class="post-catagory">${value.kategori.nama_kategori}</a>
                                <a href="/blog/${value.slug}" class="post-title">
                                    <h6>${value.judul}</h6>
                                </a>
                                <div class="post-meta">
                                    <p class="post-author">By <a href="#">${value.user.name}</a></p>
                                    <p class="post-date">${value.created_at}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                );
            });
            console.log(getdata);
        }
    });

    //get list article
    $.ajax({

        url: url,
        dataType: "json",
        success: function (getdata) {
            $.each(getdata.data.trending, function (key, value) {
                $("#article-trending").append(
                    `
                    <div class="single-blog-post style-4">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                            <a href="#"><img src="${value.foto}" style="width:290px; height:97px;" alt=""></a>
                            <span class="serial-number">${no++}</span>
                        </div>
                        <!-- Post Data -->
                        <div class="post-data">
                            <a href="/blog/${value.slug}" class="post-title">
                                <h6>${value.judul}</h6>
                            </a>
                            <div class="post-meta">
                                <p class="post-author">By <a href="#">${value.user.name}</a></p>
                            </div>
                        </div>
                    </div>
                    `
                );
            });
            console.log(getdata);
        }
    });

})(jQuery);
