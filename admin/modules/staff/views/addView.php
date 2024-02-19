<?php get_header(); ?>



<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                    <a href="?modules=staff&controllers=index&action=list" title="" id="add-new" class="fl-left">Danh sách</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" action="?modules=staff&controllers=index&action=crateAcount" >

                        <div style=" display: flex;">
                            <div style="width: 400px;">
                                <label for="product-name">User</label>
                                <input type="text" name="username" id="product-name" style="display: block;width: 300px;">
                                <label for="product-code">Password</label>
                                <input type="text" name="password" id="product-code" style="display: block;width: 300px;">
                                <label for="price">Họ tên</label>
                                <input type="text" name="fullname" id="price" style="display: block;width: 300px;">
                                <label for="price">Email</label>
                                <input type="text" name="email" id="price" style="display: block;width: 300px;">
                                
                            </div>
                            <div style="width: 400px;">
                                <label for="price">Số điện thoại</label>
                                <input type="text" name="phone" id="price" style="display: block;width: 300px;">
                                <label for="price">Địa chỉ</label>
                                <input type="text" name="address" id="price" style="display: block;width: 300px;">
                                <label for="price">Chức vụ</label>
                                <select name="role" id="price" style="display: block;width: 300px;">
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="sale">Sale</option>
                                </select>
                                
                                
                        </div>
                        
                        </div>
                        
                        
                        <input type="submit" name="btn_submit_crate" id="btn-submit" value="Thêm mới" style="height: 40px;
                                                                                                border-radius: 60px;
                                                                                                width: 150px;
                                                                                                color: green;
                                                                                                border-color: white;
                                                                                                color: white;
                                                                                                background-color: #48ad48;">

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>