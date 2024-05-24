<section class="subscribe_section">
    <div class="container-fuild">
       <div class="box">
          <div class="row">
             <div class="col-md-6 offset-md-3">
                <div class="subscribe_form ">
                   <div class="heading_container heading_center">
                      <h3>Subscribe To Get Discount Offers</h3>
                   </div>
                   <p>Don't miss out on our exclusive deals! Subscribe now to receive special discount offers and stay updated with the latest trends and collections. Enjoy savings on your favorite styles and be the first to know about our new arrivals. Sign up today and start shopping smarter!</p>
                   <form action="{{ route('discount') }}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email">
                    <button type="submit">subscribe</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
