# Ittaru Innovations — Website

A lightweight, responsive static website for Ittaru Innovations.

## Included

- `index.html` — landing page and project enquiry form
- `styles.css` — responsive styles, no CSS framework
- `script.js` — small vanilla JavaScript for mobile navigation and footer year
- `success.html` — form submission confirmation page
- `assets/` — SVG logo assets and social preview
- `netlify.toml` — Netlify publish settings and basic security/cache headers
- `robots.txt` and `sitemap.xml` — update these after choosing a domain

## Contact form / email delivery

The form is configured for **Netlify Forms**. It does not require a custom backend, API key, or JavaScript form library.

1. Create a Netlify account and deploy this project (see below).
2. In Netlify, open **Forms** and confirm `project-enquiry` is detected after the first successful deploy. If form detection is disabled for the site, enable it and redeploy.
3. In the site's **Project configuration / Notifications** settings, add a form submission email notification and enter the email address where enquiries should arrive.
4. Submit a test enquiry from the live site and confirm the notification arrives. Check spam if necessary.

**Important:** email notifications cannot be fully configured until you provide/choose the receiving email address and connect the site to Netlify. The current form will not send email when opened directly from your computer as a `file://` URL.

If you want to host on cPanel or another PHP host instead, ask for a PHP mailer version; it needs a verified SMTP mailbox and credentials, which should be stored in hosting environment/configuration and never committed to public source code.

## Deploy to Netlify

### Option A — Git-based deploy (recommended)
1. Extract this ZIP.
2. Push the folder contents to a new GitHub repository.
3. In Netlify, choose **Add new site → Import an existing project**, connect the repository, and select the repository.
4. Build command: leave blank. Publish directory: `.`.
5. Deploy, then configure form email notifications as above.

### Option B — manual deploy
1. Extract the ZIP.
2. Open Netlify and use its manual deploy / drag-and-drop deploy flow to upload the **project folder contents** (including `index.html`, `styles.css`, `script.js`, `success.html`, `assets/`, and `netlify.toml`).
3. Configure the form notification email.

## Before going live

- Replace `https://example.com` in `robots.txt` and `sitemap.xml` with the final domain.
- Add the production domain in Netlify and enable HTTPS.
- Confirm the enquiry recipient email and send a test.
- Update contact details/social links when available.
- Add a privacy policy appropriate for your business and jurisdiction before collecting real customer enquiries.
- If you have an official final logo SVG, replace `assets/logo.svg`, `assets/logo-light.svg`, and `assets/mark.svg` with the approved brand artwork.

## Performance notes

- No framework or third-party JavaScript libraries.
- SVG brand assets; no large stock images.
- CSS is local and JavaScript is small and deferred.
- Responsive layout, semantic landmarks, form labels, keyboard focus styles, skip link, and reduced-motion support.
- Google Fonts are not loaded; the system font stack avoids an external font request.
- Netlify cache headers are configured for assets and static CSS/JS.

A performance score depends on the final hosting, domain, and network conditions; test the deployed URL with PageSpeed Insights after launch.
# ittaruinnovations
