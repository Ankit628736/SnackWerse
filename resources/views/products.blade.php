@extends("layouts.default")

@section("title", "Ecom - Home")

@section("style")
<style>
  body {
    background-color: #f9fafb;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .product-card {
    border: none;
    border-radius: 1rem;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #ffffff;
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
  }

  .product-img {
    border-top-left-radius: 1rem;
    border-top-right-radius: 1rem;
    object-fit: cover;
    height: 200px;
    width: 100%;
  }

  .product-details {
    padding: 1rem;
  }

  .product-title {
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: #111827;
    text-decoration: none;
    display: block;
  }

  .product-title:hover {
    color: #22c55e;
  }

  .product-price {
    color: #16a34a;
    font-weight: 500;
    font-size: 0.95rem;
  }

  .pagination {
    justify-content: center;
    margin-top: 2rem;
  }
</style>
@endsection

@section("content")
<main class="container py-4" style="max-width: 1100px;">
  <section>
    <div class="row g-4">
      @foreach($products as $product)
        <div class="col-12 col-sm-6 col-lg-3">
          <div class="card product-card h-100">
            <img src="{{ $product->image }}" alt="{{ $product->title }}" class="product-img">
            <div class="product-details">
              <a href="{{ route('products.details', $product->slug) }}" class="product-title">
                {{ $product->title }}
              </a>
              <span class="product-price">Rs.{{ number_format($product->price, 2) }}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="d-flex pagination">
      {{ $products->links() }}
    </div>
  </section>
</main>
@endsection
