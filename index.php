<?php include("includes/header.php"); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root{
        --primary:#1e3c72;
        --secondary:#2a5298;
        --accent:#ff8c00;
        --accent-light:#ffa94d;
        --muted-white: rgba(255,255,255,0.92);
        --shadow: 0 10px 30px rgba(0,0,0,0.45);
        --transition: all 0.45s cubic-bezier(.2,.9,.2,1);

        /* hero dark overlay (0 = no dark, 1 = fully black) */
        --hero-darken: 0.62;
    }

    html,body{height:100%;}

    body{
        margin:0;
        font-family: 'Inter', sans-serif;
        color:var(--muted-white);
        background: url('images/body-bg.jpg') center/cover fixed no-repeat;
        -webkit-font-smoothing:antialiased;
        -moz-osx-font-smoothing:grayscale;
        line-height:1.6;
        -webkit-font-feature-settings: "liga";
    }

    /* wrapper so body bg shows through */
    .site-overlay{
        background: linear-gradient(180deg, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.65) 100%);
        min-height:100vh;
    }

    h1,h2,h3,h4,h5{font-family:'Poppins',sans-serif;margin:0;color:var(--muted-white);}

    a{color:inherit;text-decoration:none;transition:var(--transition);}
    a:hover{opacity:.95;transform:translateY(-2px);}

    /* HERO */
    .hero{
        position:relative;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:120px 5% 80px;
        min-height:85vh;
        text-align:center;
        overflow:hidden;
    }

    /* hero background (desktop uses fixed parallax feel) */
    .hero::before{
        content:"";
        position:absolute;
        inset:0;
        background: url('images/hero-bg.jpg') center/cover no-repeat;
        background-size:cover;
        /* desktop parallax-like */
        background-attachment: fixed;
        z-index:-3;
        transform:translateZ(0);
        will-change: transform;
        filter: saturate(.85) contrast(.95);
    }

    /* overlay layer - uses CSS var set by JS on scroll */
    .hero::after{
        content:"";
        position:absolute;
        inset:0;
        z-index:-2;
        background: linear-gradient(180deg,
            rgba(0,0,0,calc(var(--hero-darken) * 0.6)),
            rgba(0,0,0,calc(var(--hero-darken) * 0.85)));
        pointer-events:none;
    }

    /* small vignette at edges for depth */
    .hero .hero-vignette{
        position:absolute;inset:0;z-index:-1;
        background: radial-gradient(ellipse at center, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0.45) 60%, rgba(0,0,0,0.7) 100%);
        pointer-events:none;
    }

    .hero-content{
        max-width:980px; z-index:2;
        opacity:0; transform:translateY(18px);
        transition: opacity 900ms cubic-bezier(.2,.9,.2,1), transform 900ms cubic-bezier(.2,.9,.2,1);
        /* nicer text rendering */
        -webkit-font-smoothing:antialiased;
    }
    .hero-content.visible{ opacity:1; transform:translateY(0); }

    .hero-content h1{
        font-size:3rem; line-height:1.06; letter-spacing:-0.6px;
        text-shadow: 0 10px 30px rgba(0,0,0,0.6);
    }
    .hero-content p{
        color: rgba(255,255,255,0.88); font-size:1.05rem; margin:18px auto 22px; max-width:760px;
        text-shadow: 0 6px 18px rgba(0,0,0,0.45);
    }

    .btn-primary{
        display:inline-flex; gap:10px; align-items:center;
        padding:12px 28px; border-radius:999px; border:none; cursor:pointer;
        font-weight:700; color:#0b0b0d;
        background: linear-gradient(90deg,var(--accent),var(--accent-light));
        box-shadow: 0 12px 40px rgba(255,140,0,0.18);
        transition: transform 280ms ease, box-shadow 280ms ease;
    }
    .btn-primary:hover{ transform:translateY(-4px) scale(1.01); box-shadow:0 20px 60px rgba(255,140,0,0.22); }

    .hero-sub{ margin-top:12px; color:rgba(255,255,255,0.78); font-size:.95rem; }

    /* SECTIONS below inherit dark overlay but cards are slightly translucent */
    section{padding:70px 5%;}

    /* STATS */
    .stats-container{ display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:20px; }
    .stat-item{
        padding:22px; border-radius:12px; text-align:center;
        background: rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.03);
        box-shadow: 0 8px 28px rgba(0,0,0,0.55); backdrop-filter: blur(6px);
        transition: transform 300ms ease, box-shadow 300ms ease;
    }
    .stat-item:hover{ transform:translateY(-6px); box-shadow:0 18px 50px rgba(0,0,0,0.6); }
    .stat-icon{ width:66px;height:66px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 10px;background:linear-gradient(180deg, rgba(255,255,255,0.06), rgba(255,255,255,0.02)); color:var(--accent-light); font-size:1.45rem; }
    .stat-number{ font-size:1.9rem; font-weight:700; color:var(--muted-white); }
    .stat-text{ color:rgba(255,255,255,0.72); font-weight:600; }

    /* FACILITIES */
    .facilities-grid{ display:grid; grid-template-columns: repeat(auto-fit,minmax(260px,1fr)); gap:24px; }
    .facility-card{
        border-radius:12px; overflow:hidden; position:relative;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
        border:1px solid rgba(255,255,255,0.03);
        box-shadow: 0 10px 40px rgba(0,0,0,0.6); transition: transform 360ms, box-shadow 360ms;
    }
    .facility-card:hover{ transform:translateY(-10px); box-shadow:0 25px 70px rgba(0,0,0,0.7); }
    .facility-card img{ width:100%; height:220px; object-fit:cover; display:block; filter:contrast(.95) saturate(.95); }
    .facility-content{ padding:16px; color:rgba(255,255,255,0.92); }
    .facility-content h3{ margin-bottom:8px; }
    .facility-content p{ color:rgba(255,255,255,0.72); }

    .facility-icon{ position:absolute; top:-16px; right:16px; width:56px;height:56px;border-radius:50%; display:flex; align-items:center; justify-content:center; background: linear-gradient(180deg,var(--accent),var(--accent-light)); color:#0b0b0d; box-shadow:0 8px 30px rgba(0,0,0,0.5); }

    /* NEWS: horizontal scroller with snap */
    .news-container{
        display:flex; gap:20px; overflow-x:auto; padding:10px 6px 18px; -webkit-overflow-scrolling:touch;
        scroll-snap-type: x proximity;
    }
    .news-card{ min-width:320px; scroll-snap-align:start; border-radius:12px; overflow:hidden;
        background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); border:1px solid rgba(255,255,255,0.03);
        box-shadow:0 14px 40px rgba(0,0,0,0.6);
    }
    .news-card img{ width:100%; height:200px; object-fit:cover; display:block; }
    .news-content{ padding:14px; color:rgba(255,255,255,0.92); }
    .news-date{ display:inline-block; font-size:0.85rem; padding:6px 10px; border-radius:20px; background:rgba(255,255,255,0.04); color:rgba(255,255,255,0.92); margin-bottom:8px; }

    .news-content h4{ margin:8px 0; color:var(--muted-white); font-size:1.05rem; }
    .news-content p{ color:rgba(255,255,255,0.74); margin-bottom:10px; }

    /* CTA */
    .cta{ padding:60px 5%; text-align:center; background: linear-gradient(180deg, rgba(14,24,37,0.25), rgba(2,6,23,0.45)); }
    .cta h2{ font-size:2rem; margin-bottom:8px; }
    .cta p{ color:rgba(255,255,255,0.78); margin-bottom:18px; }

    /* reveal common */
    .reveal{ opacity:0; transform:translateY(18px); transition: opacity 650ms cubic-bezier(.2,.9,.2,1), transform 650ms cubic-bezier(.2,.9,.2,1); }
    .reveal.in-view{ opacity:1; transform:translateY(0); }

    footer{ color:rgba(255,255,255,0.6); padding:30px 5%; text-align:center; }

    /* Responsiveness */
    @media (max-width:992px){
        .hero{ padding:80px 5% 60px; min-height:72vh; }
        .hero-content h1{ font-size:2.4rem; }
        .facility-card img{ height:200px; }
    }
    @media (max-width:576px){
        .hero-content h1{ font-size:1.9rem; }
        .facility-card img{ height:160px; }
        /* mobile: avoid fixed background (many mobile browsers ignore it) */
        .hero::before{ background-attachment: scroll; background-position: center top; }
    }

    /* Accessibility: prefer reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .hero-content, .reveal { transition: none !important; animation: none !important; }
    }
</style>

<div class="site-overlay">

<!-- Hero -->
<section class="hero" aria-label="Library hero">
    <div class="hero-vignette" aria-hidden="true"></div>
    <div class="hero-content" id="heroContent">
        <h1>Discover a World of Knowledge — Welcome to Our Library</h1>
        <p>Explore vast collections, digital resources, and inspiring spaces crafted to fuel curiosity and learning. Join today to unlock exclusive access and events.</p>
        <a class="btn-primary" href="aboutus.php">Explore Our Resources <i class="fas fa-arrow-right"></i></a>
        <div class="hero-sub">Membership, workshops, and digital archives — everything designed for learners.</div>
    </div>
</section>

<!-- Stats -->
<section class="stats" aria-label="Statistics">
    <div class="stats-container">
        <div class="stat-item reveal"><div class="stat-icon"><i class="fas fa-book"></i></div><div class="stat-number">50,000+</div><div class="stat-text">Books Available</div></div>
        <div class="stat-item reveal"><div class="stat-icon"><i class="fas fa-users"></i></div><div class="stat-number">15,000+</div><div class="stat-text">Active Members</div></div>
        <div class="stat-item reveal"><div class="stat-icon"><i class="fas fa-laptop"></i></div><div class="stat-number">200+</div><div class="stat-text">Digital Resources</div></div>
        <div class="stat-item reveal"><div class="stat-icon"><i class="fas fa-calendar-alt"></i></div><div class="stat-number">50+</div><div class="stat-text">Annual Events</div></div>
    </div>
</section>

<!-- Facilities -->
<section class="facilities" aria-label="Facilities">
    <div class="section-header">
        <h2>Our Premium Facilities</h2>
        <p>Experience world-class amenities designed to enhance your learning journey</p>
    </div>
    <div class="facilities-grid">
        <div class="facility-card reveal">
            <div class="facility-icon"><i class="fas fa-book-reader"></i></div>
            <img src="images/photo5.jpg" alt="Reading Room">
            <div class="facility-content"><h3>Spacious Reading Rooms</h3><p>Quiet, comfortable reading spaces with modern ergonomic furniture, perfect for focused study and research.</p><a href="#" class="news-link">Learn More <i class="fas fa-arrow-right"></i></a></div>
        </div>

        <div class="facility-card reveal">
            <div class="facility-icon"><i class="fas fa-laptop-code"></i></div>
            <img src="images/pho1.jpg" alt="Computer Lab">
            <div class="facility-content"><h3>Advanced Digital Lab</h3><p>Access to high-speed computers, e-books, academic databases, and digital resources to enhance learning.</p><a href="#" class="news-link">Learn More <i class="fas fa-arrow-right"></i></a></div>
        </div>

        <div class="facility-card reveal">
            <div class="facility-icon"><i class="fas fa-chalkboard-teacher"></i></div>
            <img src="images/photo3.jpg" alt="Events">
            <div class="facility-content"><h3>Workshops & Events</h3><p>Regular events, workshops, and reading sessions to foster learning and community engagement.</p><a href="#" class="news-link">Learn More <i class="fas fa-arrow-right"></i></a></div>
        </div>
    </div>
</section>

<!-- News -->
<section class="news" aria-label="News and events">
    <div class="section-header">
        <h2>Latest News & Events</h2>
        <p>Stay updated with our upcoming events and library news</p>
    </div>
    <div class="news-container" id="newsContainer" role="list">
        <div class="news-card reveal" role="listitem">
            <img src="images/photo3.jpg" alt="Book Fair 2025">
            <div class="news-content"><span class="news-date">June 15, 2025</span><h4>Annual Book Fair 2025</h4><p>Join our annual book fair featuring thousands of books, author meetups, and exclusive discounts for members.</p><a href="#" class="news-link">Read More <i class="fas fa-arrow-right"></i></a></div>
        </div>

        <div class="news-card reveal" role="listitem">
            <img src="images/photo4.jpg" alt="Reading Workshop">
            <div class="news-content"><span class="news-date">July 5, 2025</span><h4>Advanced Reading Workshop</h4><p>Interactive reading sessions and speed reading techniques for students and book enthusiasts.</p><a href="#" class="news-link">Read More <i class="fas fa-arrow-right"></i></a></div>
        </div>

        <div class="news-card reveal" role="listitem">
            <img src="images/photo5.jpg" alt="Tech & Innovation">
            <div class="news-content"><span class="news-date">August 12, 2025</span><h4>Tech & Innovation Summit</h4><p>Workshops on emerging technologies, digital literacy, and innovation resources for students.</p><a href="#" class="news-link">Read More <i class="fas fa-arrow-right"></i></a></div>
        </div>

        <div class="news-card reveal" role="listitem">
            <img src="images/pho1.jpg" alt="Digital Resources">
            <div class="news-content"><span class="news-date">September 8, 2025</span><h4>Digital Resources Launch</h4><p>We're launching 50+ new digital resources and databases for enhanced academic research.</p><a href="#" class="news-link">Read More <i class="fas fa-arrow-right"></i></a></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta" aria-label="Call to action">
    <div class="cta-content">
        <h2>Become a Member Today!</h2>
        <p>Join our community of learners and enjoy unlimited access to books, digital resources, workshops, and exclusive events.</p>
        <a href="student/register.php" class="btn-primary">Register Now <i class="fas fa-user-plus"></i></a>
    </div>
</section>

<hr>

<?php include("includes/footer.php"); ?>
</div> <!-- .site-overlay -->

<script>
/* Smooth behavior, reveal on scroll, and controlled hero overlay */
document.addEventListener('DOMContentLoaded', function() {
    // Hero content reveal
    const heroContent = document.getElementById('heroContent');
    setTimeout(()=> heroContent.classList.add('visible'), 120);

    // IntersectionObserver for reveals
    const revealEls = document.querySelectorAll('.reveal');
    const ioOptions = { root: null, rootMargin: '0px', threshold: 0.12 };
    const io = ('IntersectionObserver' in window) ? new IntersectionObserver((entries)=> {
        entries.forEach(en => {
            if(en.isIntersecting){
                en.target.classList.add('in-view');
                // optionally unobserve to reduce work
                io.unobserve(en.target);
            }
        });
    }, ioOptions) : null;

    if(io) revealEls.forEach(el => io.observe(el));
    else revealEls.forEach(el => el.classList.add('in-view')); // fallback

    // News wheel -> horizontal scroll. Prevent accidental vertical lock on desktops.
    const news = document.getElementById('newsContainer');
    if(news){
        // add wheel handler (desktop) - passive false
        news.addEventListener('wheel', function(e){
            if(Math.abs(e.deltaY) > Math.abs(e.deltaX)){
                e.preventDefault();
                news.scrollBy({ left: e.deltaY, behavior: 'smooth' });
            }
        }, { passive: false });

        // enable keyboard arrows for accessibility
        news.tabIndex = 0;
        news.addEventListener('keydown', function(e){
            if(e.key === 'ArrowRight') news.scrollBy({ left: 320, behavior: 'smooth' });
            if(e.key === 'ArrowLeft') news.scrollBy({ left: -320, behavior: 'smooth' });
        });
    }

    // Debounced scroll handler to adjust hero darkness subtly as user scrolls down
    let last = 0, ticking = false;
    function onScroll(){
        last = window.scrollY || window.pageYOffset;
        if(!ticking){
            window.requestAnimationFrame(()=> {
                // Compute new hero darken value between 0.35 and 0.75 (clamped)
                let v = 0.35 + Math.min(last / 1200, 0.4); // 0.35..0.75
                document.documentElement.style.setProperty('--hero-darken', v.toFixed(3));
                ticking = false;
            });
            ticking = true;
        }
    }
    window.addEventListener('scroll', onScroll, { passive: true });

    // Mobile optimization: disable heavy parallax if device is touch
    const isTouch = 'ontouchstart' in window || navigator.maxTouchPoints > 0;
    if(isTouch){
        document.querySelectorAll('.hero::before'); // noop - just to keep code flow
        // remove background-attachment fixed on touch devices by adding a class
        document.documentElement.classList.add('touch-device');
    }

    // Accessibility: reduce motion respect is handled by CSS @media
});
</script>
