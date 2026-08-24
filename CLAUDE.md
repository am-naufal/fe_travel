# CLAUDE.md

> Master instruction file untuk Claude Code.
>
> File ini WAJIB dibaca sebelum membaca seluruh spesifikasi lainnya.
>
> Prioritas tertinggi setelah system prompt adalah file ini.

---

# PROJECT

Nama Project:

```text
Garuda Praya Tour
```

Jenis:

```text
Travel & Tour Management Platform
```

Tech Stack:

```text
Laravel 12
PHP 8.4
MySQL
Filament v4
Tailwind CSS v4
AlpineJS
Vite
```

---

# DEVELOPMENT METHODOLOGY

Project ini menggunakan:

```text
Spec-Driven Development (SDD)
```

Claude HARUS mengikuti spesifikasi.

Claude DILARANG:

- Mengasumsikan requirement sendiri
- Menambah fitur tanpa spesifikasi
- Mengubah struktur layout
- Mengubah design token
- Mengubah flow user

Jika spesifikasi tidak tersedia:

```text
STOP
ASK FOR SPEC
DO NOT IMPLEMENT
```

---

# SOURCE OF TRUTH

Urutan prioritas dokumen:

```text
1. CLAUDE.md
2. FRONTEND_PRD.md
3. DESIGN.md
4. DESIGN_TOKENS.md
5. UI_ARCHITECTURE.md
6. COMPONENT_SPEC.md
7. LAYOUT_SPEC.md
8. PAGE_*_SPEC.md
9. RESPONSIVE_SPEC.md
10. SEO_SPEC.md
11. ACCESSIBILITY_SPEC.md
12. IMPLEMENTATION_RULES.md
```

Jika terjadi konflik:

```text
Dokumen dengan prioritas lebih tinggi menang.
```

---

# CODING PHILOSOPHY

Tujuan utama:

```text
Maintainability
Consistency
Readability
Performance
SEO
Reusability
```

Prioritas:

```text
Correctness > Simplicity > Performance > Cleverness
```

Claude DILARANG membuat kode yang terlalu kompleks.

---

# FRONTEND RULES

Claude HARUS:

- Mobile First
- Reusable Components
- Semantic HTML
- Accessibility Friendly
- SEO Friendly

Claude DILARANG:

- Inline CSS
- Inline Javascript
- Hardcoded Color
- Hardcoded Font Size
- Hardcoded Spacing

Semua nilai harus berasal dari:

```text
DESIGN_TOKENS.md
```

---

# COMPONENT RULES

Semua UI harus dibuat sebagai component reusable.

Contoh:

```text
Button
PackageCard
DestinationCard
SectionTitle
Navbar
Footer
```

Claude DILARANG membuat duplicate component.

Jika component sudah ada:

```text
Reuse Existing Component
```

---

# LAYOUT RULES

Claude HARUS menggunakan:

```css
max-width: 1280px;
margin: auto;
padding-left: 24px;
padding-right: 24px;
```

Claude DILARANG:

- Membuat container baru
- Membuat width random
- Menggunakan fixed width

---

# DESIGN TOKEN RULES

Claude HARUS menggunakan token.

Contoh:

SALAH

```html
class="bg-purple-700"
```

BENAR

```html
class="bg-primary"
```

Semua warna berasal dari:

```text
DESIGN_TOKENS.md
```

---

# RESPONSIVE RULES

Breakpoint WAJIB:

```text
Mobile
0-767

Tablet
768-1023

Desktop
1024+
```

Claude DILARANG membuat breakpoint tambahan.

---

# FILE STRUCTURE

Frontend Structure:

```text
resources/
└── views/
    ├── pages/
    ├── components/
    ├── layouts/
    └── partials/
```

Tailwind:

```text
resources/css/
```

Javascript:

```text
resources/js/
```

---

# BLADE RULES

Gunakan:

```blade
<x-navbar />
<x-footer />
<x-package-card />
```

Jangan:

```blade
Copy paste markup berulang
```

---

# PERFORMANCE RULES

Target Lighthouse:

```text
Performance > 90
Accessibility > 90
Best Practices > 90
SEO > 90
```

Claude HARUS:

- Lazy Load Image
- Use WebP
- Minimize DOM
- Avoid Large Bundle

---

# ACCESSIBILITY RULES

Wajib:

```text
Semantic HTML
Alt Image
ARIA Label
Keyboard Navigation
Focus State
```

Semua form harus memiliki:

```html
label
```

Claude DILARANG:

```html
placeholder-only form
```

---

# SEO RULES

Semua halaman WAJIB memiliki:

```html
<title>
<meta description>
canonical
og:title
og:image
```

Schema:

```text
Organization
TouristTrip
Breadcrumb
```

---

# ANIMATION RULES

Allowed:

```text
Fade Up
Hover Scale
Counter
```

Forbidden:

```text
Parallax
Heavy Animation
Complex Timeline
GSAP
```

Tujuan:

```text
Fast Rendering
```

---

# FILAMENT RULES

Filament hanya untuk:

```text
Admin Dashboard
```

Jangan menggunakan Filament untuk:

```text
Public Website
```

Public Website menggunakan:

```text
Blade + Tailwind
```

---

# DATABASE AWARENESS

Entity utama:

```text
Tour Package
Destination
Booking
Customer
Testimonial
Blog Article
```

Claude tidak boleh membuat entity tambahan tanpa spesifikasi.

---

# GIT RULES

Setiap task harus menghasilkan:

```text
Small Commit
Single Responsibility
```

Contoh:

```text
feat(home): create hero section

feat(package): create package card component

fix(navbar): mobile menu responsiveness
```

---

# AI EXECUTION WORKFLOW

Sebelum coding:

Step 1

```text
Read CLAUDE.md
```

Step 2

```text
Read Related Specs
```

Step 3

```text
Create Plan
```

Step 4

```text
Implement
```

Step 5

```text
Self Review
```

Step 6

```text
Verify Against Specs
```

---

# SELF REVIEW CHECKLIST

Sebelum menyelesaikan task:

- [ ] Sesuai DESIGN.md
- [ ] Sesuai COMPONENT_SPEC.md
- [ ] Sesuai RESPONSIVE_SPEC.md
- [ ] Tidak ada inline CSS
- [ ] Tidak ada duplicate component
- [ ] Menggunakan design tokens
- [ ] Mobile responsive
- [ ] Accessibility valid
- [ ] SEO valid

Jika ada item yang gagal:

```text
REVISE BEFORE FINISHING
```

---

# DEFINITION OF DONE

Task dianggap selesai jika:

- Semua spesifikasi terpenuhi
- Tidak ada pelanggaran CLAUDE.md
- Responsive di seluruh breakpoint
- Lighthouse target tercapai
- Component reusable
- Tidak ada code duplication
- Build berhasil
- Tidak ada error console

END OF FILE
