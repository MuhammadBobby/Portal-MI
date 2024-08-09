 @props(['mini_title', 'href'])

 <div class="head-title">
     <div class="left">
         <h1>{{ $mini_title }}</h1>
         <ul class="breadcrumb">
             <li>
                 <a href="/admin">Dashboard</a>
             </li>
             <li><i class='bx bx-chevron-right'></i></li>
             <li>
                 <a class="active" href="{{ $href }}">{{ $mini_title }}</a>
             </li>
         </ul>
     </div>

     @if ($mini_title == 'Home')
         <a href="#" class="btn-download">
             <i class='bx bxs-cloud-download'></i>
             <span class="text">Download PDF</span>
         </a>
     @endif
 </div>
