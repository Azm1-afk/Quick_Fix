<div class="navtop">
    <div class="navtop-left">
    <img src="logo.png" alt="Logo">
        <a href="http://localhost/newproject/pages/home/home.php">QuickFix</a>
    </div>
    <div class="navtop-right">
        <a href="/products">Products</a> <!--redirections from the navtop here-->
        <a href="/repairs">Repairs</a>
        <a href="../login/login.php">Login</a>
    </div>
</div>


<style>
/* navtop.css */
.navtop {
    background-color: rgb(35, 124, 136);
    padding: 30px;
    border-bottom: 1px solid #b2ebf2;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navtop-left {
    display: flex; /* Use flexbox to align logo and text horizontally */
    align-items: center; /* Vertically center logo and text */
    gap: 10px; /* Add some space between the logo and text */
}

.navtop-left img {
    height: 20px; /* Adjust the height of your logo as needed */
    /* You can add other styles here, such as:
       border-radius: 50%;  to make it a circle
       margin-right: 10px;  If you don't use gap
    */
}


.navtop-left a {
    color: #333;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.navtop-right a {
    color: #555;
    text-decoration: none;
    font-size: 16px;
    margin-left: 20px;
}

.navtop-right a:hover {
    color: #007bff;
}
</style>
