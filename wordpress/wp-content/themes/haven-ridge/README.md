# Haven Ridge — tema WordPress para criadero de Mini-Bernedoodles

Sitio nuevo al estilo Amerilist: **páginas armadas con bloques ACF**, fáciles de editar sin tocar código. El diseño es más editorial y moderno que [Namaste Bernedoodles](https://namastepoodles.com/) y [Orchard Valley Doodles](https://orchardvalleydoodles.com/), manteniendo un tono elegante (no “cutesy”).

**Marca de trabajo:** Haven Ridge. Cámbiala en Ajustes → Generales y, si quieres, sube un logo en Apariencia → Personalizar.

## Qué incluye

- Tema clásico PHP (`haven-ridge`) con 16 bloques ACF (hero, stats, cachorros, camadas, padres, FAQ, waitlist, contacto, etc.).
- Custom Post Types: **Puppies**, **Litters**, **Puppy parents** — para actualizar disponibilidad como un inventario, no como una página estática.
- Home, Available, About, Parents, Guardian, FAQ y Contact con contenido demo si aún no hay bloques.
- Formulario de interés (envía email) o shortcode de CF7 / WPForms.
- Preview estático del home: abre `preview.html` en el navegador (no necesita WordPress).

## Cómo editar (flujo Amerilist)

1. Instala **ACF PRO**.
2. Activa el tema **Haven Ridge**.
3. Apariencia → **Haven Ridge setup** → crea páginas y menú.
4. Edita **Home** (o cualquier página) en Gutenberg.
5. Inserter → categoría **Haven Ridge** → añade / reordena bloques.
6. Cada bloque tiene campos en la barra lateral: títulos, fotos, botones, repeaters.
7. Cachorros y padres se actualizan en los menús **Puppies** y **Puppy parents**.

Los bloques funcionan en preview dentro del editor (`mode: preview`), igual que los layouts flexibles de Amerilist, pero nativos de Gutenberg.

## Instalación local

1. Copia / usa este WordPress (`wordpress/`).
2. Crea `wp-config.php` y una base de datos.
3. Sube **Advanced Custom Fields PRO** a `wp-content/plugins/`.
4. Activa ACF y el tema Haven Ridge.
5. Settings → Permalinks → Save (para `/puppies/`, `/parents/`).

## Personalización rápida

| Qué | Dónde |
| --- | --- |
| Teléfono, email, redes, anuncio | **Site settings** (ACF) o Personalizar |
| Home completo | Página Home + bloques Haven |
| Cachorro disponible | CPT Puppy: foto, precio, talla, status |
| Camada próxima | Bloque “Upcoming litters” o CPT Litter |
| Copy / fotos de secciones | Campos del bloque, no PHP |

## Paleta y tipo

Marfil cálido, tinta, castaño y sage. Titulares en *Cormorant Garamond*, texto en *Outfit*. Cambia tokens en `assets/css/main.css` (`:root`).

## Notas

- Las fotos demo son de Unsplash (placeholder). Sustitúyelas por fotos reales del programa.
- El formulario nativo usa `wp_mail`. En producción conviene WPForms / CF7 y pegar el shortcode en el bloque Contact.
- ACF JSON no es obligatorio: los field groups se registran en PHP (`inc/acf-fields.php`).
