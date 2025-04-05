<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Juniorfood - Find Food</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles - Same as your dashboard */
        header {
            padding: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: white;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-text {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        .logo-text span {
            color: #ff7000;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-link {
            text-decoration: none;
            color: #666;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #ff7000;
        }

        .nav-link.active {
            color: #ff7000;
            font-weight: 600;
        }

        .search-cart-profile {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            padding: 10px 15px;
            padding-left: 40px;
            border-radius: 25px;
            border: 1px solid #ddd;
            width: 250px;
            font-size: 14px;
            outline: none;
            background-color: #f5f5f5;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .cart-container {
            position: relative;
        }

        .cart-icon {
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff7000;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        .profile-container {
            position: relative;
        }

        .profile-img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid #eee;
        }

        .profile-dropdown {
            position: absolute;
            top: 45px;
            right: 0;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            padding: 10px 0;
            min-width: 180px;
            display: none;
            z-index: 200;
        }

        .profile-dropdown.active {
            display: block;
        }

        .dropdown-item {
            padding: 10px 15px;
            display: block;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
            color: #ff7000;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #eee;
            margin: 5px 0;
        }

        /* Find Food Page Specific Styles */
        .page-title {
            text-align: center;
            margin: 30px 0;
            font-size: 32px;
            color: #333;
        }

        .food-filters {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .filter-btn {
            padding: 10px 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
            color: #666;
        }

        .filter-btn:hover, .filter-btn.active {
            background-color: #ff7000;
            color: white;
            border-color: #ff7000;
        }

        .food-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .food-card {
            background-color: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .food-card:hover {
            transform: translateY(-5px);
        }

        .food-img {
            height: 180px;
            width: 100%;
            object-fit: cover;
            border-bottom: 1px solid #f5f5f5;
        }

        .food-info {
            padding: 15px;
        }

        .food-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .food-category {
            color: #ff7000;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .food-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .food-price {
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }

        .add-to-cart {
            width: 36px;
            height: 36px;
            background-color: #ff7000;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart:hover {
            background-color: #e06100;
        }

        .load-more {
            display: block;
            margin: 30px auto 50px;
            padding: 12px 30px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .load-more:hover {
            background-color: #222;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .food-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .filter-btn {
                padding: 8px 15px;
                font-size: 13px;
            }
        }

        @media (max-width: 576px) {
            .food-grid {
                grid-template-columns: 1fr;
            }
            
            .search-container {
                display: none;
            }

            .food-filters {
                gap: 10px;
            }
            
            .filter-btn {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    <div class="logo-text">Junior<span>food</span></div>
                </div>

                <div class="nav-links">
                    <a href="{{ route('find-food') }}" class="nav-link active">Find Food</a>
                    <a href="{{ route('tracking') }}" class="nav-link">Tracking</a>
                    <a href="{{ route('location') }}" class="nav-link">Location</a>
                    <a href="{{ route('find-restaurant') }}" class="nav-link">Find Restaurant</a>
                </div>

                <div class="search-cart-profile">
                    <div class="search-container">
                        <span class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </span>
                        <input type="text" class="search-input" placeholder="Search foods...">
                    </div>

                    <div class="cart-container">
                        <span class="cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                        </span>
                        <span class="cart-badge">2</span>
                    </div>

                    <div class="profile-container">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80"
                            alt="Profile" class="profile-img" id="profileImg">
                        <div class="profile-dropdown" id="profileDropdown">
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Admin Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="dropdown-item">User Dashboard</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" class="mt-2 w-full">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm w-full text-left">
                                        <i class="fas fa-sign-out-alt mr-1"></i> Déconnexion
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                                <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main class="container">
        <h1 class="page-title">Discover Delicious Foods</h1>
        
        <div class="food-filters">
            <button class="filter-btn active">All</button>
            <button class="filter-btn">Fast Food</button>
            <button class="filter-btn">Pizza</button>
            <button class="filter-btn">Burgers</button>
            <button class="filter-btn">Asian</button>
            <button class="filter-btn">Desserts</button>
            <button class="filter-btn">Drinks</button>
        </div>
        
        <div class="food-grid">
            <!-- Food Item 1 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1571091718767-18b5b1457add?ixlib=rb-4.0.3" alt="Burger" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Classic Beef Burger</h3>
                    <p class="food-category">Burgers</p>
                    <div class="food-bottom">
                        <div class="food-price">$8.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 2 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3" alt="Pizza" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Margherita Pizza</h3>
                    <p class="food-category">Pizza</p>
                    <div class="food-bottom">
                        <div class="food-price">$11.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 3 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1626700051175-6818013e1d4f?ixlib=rb-4.0.3" alt="Sushi" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Sushi Combo</h3>
                    <p class="food-category">Asian</p>
                    <div class="food-bottom">
                        <div class="food-price">$15.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 4 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1514326640560-7d063ef2aed5?ixlib=rb-4.0.3" alt="Ice Cream" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Vanilla Ice Cream</h3>
                    <p class="food-category">Desserts</p>
                    <div class="food-bottom">
                        <div class="food-price">$4.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 5 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1619221882266-cf391a57767b?ixlib=rb-4.0.3" alt="Chicken Wings" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Spicy Chicken Wings</h3>
                    <p class="food-category">Fast Food</p>
                    <div class="food-bottom">
                        <div class="food-price">$9.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 6 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1612929633738-8fe44f7ec841?ixlib=rb-4.0.3" alt="Pasta" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Spaghetti Carbonara</h3>
                    <p class="food-category">Italian</p>
                    <div class="food-bottom">
                        <div class="food-price">$12.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 7 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1625807752781-544f90255196?ixlib=rb-4.0.3" alt="Smoothie" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Berry Smoothie</h3>
                    <p class="food-category">Drinks</p>
                    <div class="food-bottom">
                        <div class="food-price">$5.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Food Item 8 -->
            <div class="food-card">
                <img src="https://images.unsplash.com/photo-1592417817098-8fd3d9eb14a5?ixlib=rb-4.0.3" alt="Salad" class="food-img">
                <div class="food-info">
                    <h3 class="food-name">Caesar Salad</h3>
                    <p class="food-category">Healthy</p>
                    <div class="food-bottom">
                        <div class="food-price">$7.99</div>
                        <div class="add-to-cart">
                            <i class="fas fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="load-more">Load More</button>
    </main>

    <script>
        // Profile dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const profileImg = document.getElementById('profileImg');
            const profileDropdown = document.getElementById('profileDropdown');

            profileImg.addEventListener('click', () => {
                profileDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!profileImg.contains(e.target) && !profileDropdown.contains(e.target)) {
                    profileDropdown.classList.remove('active');
                }
            });
            
            // Filter buttons functionality
            const filterButtons = document.querySelectorAll('.filter-btn');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    button.classList.add('active');
                    
                    // Here you would normally filter the food items
                    // This is just a placeholder
                    console.log('Filter selected:', button.textContent);
                });
            });
            
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            
            addToCartButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const foodName = button.closest('.food-card').querySelector('.food-name').textContent;
                    alert(`${foodName} added to cart!`);
                    
                    // Update cart counter
                    const cartBadge = document.querySelector('.cart-badge');
                    const currentCount = parseInt(cartBadge.textContent);
                    cartBadge.textContent = currentCount + 1;
                });
            });
            
            // Load more button
            const loadMoreBtn = document.querySelector('.load-more');
            
            loadMoreBtn.addEventListener('click', () => {
                alert('Loading more items...');
                // Here you would normally load more food items
            });
        });
    </script>
</body>
</html>