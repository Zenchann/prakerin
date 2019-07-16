(function ($) {

    var grabedurl = window.location.pathname;
    var url = '' + grabedurl;
    var no = 1;
    //get 1 article by slug
    $.ajax({
        url: url,
        dataType: "json",
        method: "GET",
        success: function (getdata) {
            $("#singleblog").append(
                `
                <div class="single-blog-post-details">
                    <div class="post-thumb">
                        <img src="${getdata.data.foto}" style="width:729px; height:434px;" alt="">
                    </div>
                    <div class="post-data">
                        <a href="#" class="post-catagory">${getdata.data.kategori.nama_kategori}</a>
                        <h2 class="post-title">${getdata.data.judul}</h2>
                        <div class="post-meta">

                            <!-- Post Details Meta Data -->
                            <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                                <!-- Post Author & Date -->
                                <div class="post-authors-date">
                                    <p class="post-author">By <a href="#">${getdata.data.user.name}</a></p>
                                    <p class="post-date">5 Hours Ago</p>
                                </div>
                                <!-- View Comments -->
                                <div class="view-comments">
                                    <p class="views">1281 Views</p>
                                    <a href="#comments" class="comments">3 comments</a>
                                </div>
                            </div>
                            <p>${getdata.data.deskripsi}</p>
                        </div>
                    </div>
                </div>
                `
            );
            console.log(getdata);
        }
    });
    console.log(grabedurl)
})(jQuery);
