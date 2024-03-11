<?php $this->layout('admin', ['title' => 'Dashboard', 'style' => 'admin/dashboard']) ?>

<aside>
    <h1>DASHBOARD</h1>
    <div class="menu">
        <ul>
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/customer">Clientes</a></li>
        </ul>
    </div>
    <a class="btn" href="">Logout</a>
</aside>
<main>
   <section class="container-header">
   <h4><?= ucfirst($name)?></h4>
   <p>Have a nice day</p>
   </section>
   <section class="container-cards">
    <div class="card">
       
    </div>
    <div class="card">
        
    </div>
   </section>
   <section class="container-info">

   </section>

</main>