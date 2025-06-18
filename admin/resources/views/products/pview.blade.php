<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="keywords" content="">

   <title>Products</title>

   <!-- CSS Link -->
   <link rel="stylesheet" href="css/productManagement.css">

   <!-- GF Link -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@400..700&display=swap" rel="stylesheet">

   <!-- FA Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

   <!-- Bootstrap CSS Link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>

<body>

   <!-- Navigation Bar Start -->
    <h1>product views</h1>

    <table class="table">
            <thead class="table-warning">
               <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Category_ID</th>
               </tr>
            @foreach($post as $post)
            </thead>
            <tbody>
               <tr>
                  <td>{{$post->id}}</td>
                  <td>{{$post->name}}</td>
                  <td>{{$post->description}}</td>
                  <td>{{$post->price}}</td>
                  <td>{{$post->quantity}}</td>
                  <td>{{$post->status}}</td>
                  <td>{{$post->image}}</td>
                  <td>{{$post->category_id}}</td>
                  <td class="action-btns">
                     <button class="btn btn-sm me-1 btn-info text-white"><i class="bi bi-eye"></i></button>
                     <button class="btn btn-sm me-1 btn-warning text-white"><i class="bi bi-pencil-square"></i></button>
                     <button class="btn btn-sm me-1 btn-danger"><i class="bi bi-trash"></i></button>
                  </td>
               </tr>
               
            </tbody>
            @endforeach
         </table>

    

      

    
   
</body>

<style>
  :root {
   /* Colors */
   --backgroundColor: #FFD700;
   --activeLinks: #ffffff;
   --textShadow: #000000;
   --links: #FFEB3B;
   --faqBackground: #fff383;
   --linkHover: #212121;
   --hoverEffects: #212121;
   --titleColor: #0D47A1;
   --titleColorOne: #0d48a1ab;
   --heroText: #E3E3E3;
   --whiteColor: #ffffff;
   --blackColor: #000000;
   --serviceBackground: #dff3ff;
   --blackColor: #212121;
   --bgColorOne: #0D47A1;
   --bgColorTwo: #FF9800;
   --text: #FFFFFF;
   --links: #FFEB3B;
   --hoverEffects: #424242;
   --bodyBackground: #f4f7fc;
 
   /* Fonts */
   --fFamily: "Roboto", sans-serif;
   --foSizing: auto;
   --fWeight: 400;
   --fStyle: normal;
   --fvSettings: "wdth" 100;
 }
 
 body {
   padding-top: 86px;
   background-color: var(--bodyBackground) !important;
 
 }
 
 * {
   font-family: var(--fFamily);
   font-optical-sizing: var(--foSizing);
   font-weight: var(--fWeight);
   font-style: var(--fStyle);
   font-variation-settings: var(--fvSettings);
 }
 
 /* Navigation styles */
 .navbar {
   background-color: #ffffff;
   border-bottom: 1px solid #e0e0e0;
   box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
   transition: background-color 0.3s ease;
 }
 
 .navbar-brand {
   font-size: 1.7rem;
   font-weight: 700;
   color: #343a40;
 }
 
 .navbar-nav .nav-link {
   position: relative;
   font-weight: 500;
   color: #333;
   margin-right: 1rem;
   transition: color 0.3s ease;
 }
 
 .navbar-nav .nav-link::after {
   content: "";
   position: absolute;
   width: 0%;
   height: 2px;
   bottom: 0;
   left: 0;
   background-color: #007bff;
   transition: width 0.3s ease;
 }
 
 .navbar-nav .nav-link:hover,
 .navbar-nav .nav-link.active {
   color: #007bff;
 }
 
 .navbar-nav .nav-link:hover::after,
 .navbar-nav .nav-link.active::after {
   width: 100%;
 }
 
 .dropdown-menu {
   border-radius: 0.25rem;
   box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
   padding: 0.5rem 0;
 }
 
 .dropdown-menu .dropdown-item {
   transition: background-color 0.2s ease, padding-left 0.2s ease;
 }
 
 .dropdown-menu .dropdown-item:hover {
   background-color: #f8f9fa;
   padding-left: 1.5rem;
 }
 
 .nav-icon {
   font-size: 1.3rem;
   margin-left: 18px;
   color: #333;
   transition: color 0.3s ease;
 }
 
 .nav-icon:hover {
   color: #007bff;
 }
 
 @media (max-width: 991.98px) {
   .navbar-nav .nav-link {
     margin-right: 0;
   }
 }
 
 /* Table */
 
 .Content {
   margin: 50px auto;
   padding: 20px;
   background: var(--whiteColor);
   border-radius: 5px;
   margin-top: -60px;
   box-shadow: 2px 2px 4px var(--hoverEffects);
 }
 
 .Content .Search {
   border: none;
   border-radius: 0px;
   background-color: var(--faqBackground);
 }
 
 .Content .Search .SButton {
   color: var(--hoverEffects);
   font-weight: 500;
   background-color: var(--faqBackground);
   border: 2px solid var(--hoverEffects);
   transition: all 200ms;
 }
 
 .Content .Search .SButton:hover {
   color: var(--whiteColor);
   background-color: var(--backgroundColor);
   border: 2px solid var(--whiteColor);
 }

</style>

</html>