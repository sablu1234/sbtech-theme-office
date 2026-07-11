# SBTech Main - Premium Real Estate WordPress Theme

SBTech Main is a premium, custom WordPress theme designed for real estate agencies and property developers. It integrates advanced features like real-time currency conversion, Google Places API integration, and flexible listing agent assignments.

## Core Features

### 1. Unified Listing Agent Contacts Card
- **CPT Integrations**: Allows assigning custom post type `agents` directly to properties via specifications metabox dropdown (`spec_agent_id`).
- **Dynamic Contact Information**: Displays agent details (circle photo, name, designation, and BRN No) on the property page.
- **Dynamic Links**: Automatically overrides default property links (Call, WhatsApp, Email Agent) with the selected agent's details (falling back to property defaults if details are empty).
- **Pill Form Layout**: Embeds the property inquiry form styled as clean, fully rounded pill fields.

### 2. Precise Currency Converter
- **Decimal Precision**: Supports floats for per-square-foot price (`AED per ft²`) to prevent rounding errors (e.g., displaying `0.27 USD per ft²` instead of `0 USD`).
- **Real-time Switches**: Instantly converts pricing based on selected payout currencies with dynamic decimal formatting support.
- **Failover Cache**: Implements local backup exchange rates in case the third-party remote API is temporarily down.

### 3. Dubai Locations Autocomplete & Transient Caching
- **Google Places Integration**: Employs Google Places Autocomplete API restricted to the UAE (`ae`) to automatically recommend Dubai locations.
- **Cache-efficient Queries**: Performs API requests targeting Dubai coordinates (`25.2048, 55.2708`) across multiple categories (malls, transit, schools) and caches them locally for 24 hours under the transient `dubai_locations_cache`.
- **Admin Utilities**: Allows manually clearing locations cache by adding `?clear_locations_cache=1` to the page URL in WP Admin.

---

## Theme Directory Structure

```text
wp-content/themes/sbtech-main/
├── assets/                  # CSS, JS, Images, and dynamic styling assets
├── inc/                     # Core helper functions, customization libraries, and CPTs
│   ├── custom-cpt/          # Custom Post Types (agent-cpt, developer-cpt, achievements, etc.)
│   ├── admin-setting-api/   # Options page and settings administration logic
│   ├── sbtech-kirki.php     # Customizer settings and control logic
│   └── template-function.php# Global theme helper functions
├── template-parts/          # Theme template components
│   ├── developers/          # Template blocks specifically for developers post types
│   ├── filter/              # Property listing Ajax filters templates
│   ├── form/                # Inquiry, contact, cv, and mortgage estimation forms
│   ├── services-parts/      # Subpage services layouts (mortgages, management, snagging, etc.)
│   ├── content.php          # Main property single page layout
│   └── loop-movie.php       # Dynamic loop layouts
├── single-agents.php        # Single page template for agents post types
├── single-area.php          # Single page template for areas post types
├── single-developer.php     # Single page template for developers post types
├── page-*.php               # Customized page templates (about, buy, careers, rent, sell, etc.)
├── functions.php            # Primary theme functions, hooks, and stylesheet enqueues
└── README.md                # Project documentation and theme overview
```

---

## Important Customized Files

### Theme Files (`wp-content/themes/sbtech-main/`)
- **[content.php](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/themes/sbtech-main/template-parts/content.php)**: Controls the property single page. Renders sidebar styles, Call & WhatsApp grid, circular avatar agent card, and embeds the inquiry form.
- **[property-single.css](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/themes/sbtech-main/assets/css/property-single.css)**: Styles the sidebar cards, button grids, agent portraits, and overrides the default inquiry form styles.
- **[agent-cpt.php](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/themes/sbtech-main/inc/custom-cpt/agent-cpt.php)**: Manages Custom Post Type `agents`. Extended to support **Phone**, **Email**, and **BRN No** metabox inputs.

### Plugin Files (`wp-content/plugins/realestate-ajax-filters/`)
- **[class-reaf-meta-box.php](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/plugins/realestate-ajax-filters/includes/class-reaf-meta-box.php)**: Handles property Specifications meta box. Added `spec_agent_id` selection, real-time avatar preview script, and automated Places API coordinates fetching.
- **[realestate-ajax-filters.php](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/plugins/realestate-ajax-filters/realestate-ajax-filters.php)**: Enqueues the Google Maps JavaScript API with the `places` library.
- **[reaf-admin.js](file:///c:/Users/SoftVence/Local%20Sites/sam91222-again/app/public/wp-content/plugins/realestate-ajax-filters/includes/admin/assets/reaf-admin.js)**: Binds Autocomplete instances to the `#pp_address` field.

---

## Setup & Configuration

1. **Google Maps API Key**: Make sure the API key is configured with the Google Places API enabled.
2. **Assigning Agents**:
   - Go to **Agents** > **Add New** or edit an existing agent.
   - Enter their Phone, Email, WhatsApp, Designation, BRN No, and set a Featured Image.
   - Edit any **Property**, scroll to **Specifications**, choose the Agent from the dropdown list, and save.
