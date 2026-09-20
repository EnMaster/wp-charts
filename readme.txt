=== DataCharts ===
Contributors: enrico-dev
Tags: elementor, charts, graphs, diagram, widget, bar, line, pie
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.0.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display beautiful, responsive charts (bar, line, pie, doughnut, polar area, radar) built from JSON data, right inside your Elementor pages.

== Description ==

DataCharts adds a **Grafico / Chart** widget to the Elementor page builder. Paste your data as JSON in the widget settings, pick the chart type, and DataCharts renders an interactive, responsive chart powered by Chart.js.

No coding required: mark up your data once, then choose from six chart types in a dropdown.

= Features =

* **6 chart types**: Bar, Line, Pie, Doughnut, Polar Area, Radar.
* **JSON data input** with syntax highlighting in the Elementor editor.
* **Automatic color palette** — you can override colors per dataset.
* **Custom title**, legend (show/hide + position), chart height.
* **Fully responsive**, works on mobile and desktop.
* **Privacy friendly** — no data is collected, stored, or sent anywhere.

= How the JSON data works =

The widget expects a `labels` array and one or more `datasets`:

```
{
  "labels": ["January", "February", "March"],
  "datasets": [
    {
      "label": "Sales",
      "data": [120, 190, 90]
    }
  ]
}
```

For **pie**, **doughnut** and **polar area** charts only the first dataset is used; each slice receives its own color automatically.

You can optionally override colors per dataset with `backgroundColor` and `borderColor`.

= Getting started =

1. Install and activate the plugin from **Plugins → Add New** (search "DataCharts") or upload the ZIP.
2. Open your page in Elementor and search the widget panel for **"Grafico / Chart"** (category **DataCharts**).
3. Choose the chart type, paste your JSON data and adjust title, height and legend.
4. Hit **Update** and preview your page.

= Privacy =

DataCharts does not collect, store, process or transmit any personal data. Chart.js is bundled locally with the plugin, so no external resources are loaded.

== Installation ==

= Automatic installation =

1. In your WordPress admin, go to **Plugins → Add New**.
2. Search for **"DataCharts"**.
3. Click **Install Now** and then **Activate**.

= Manual installation =

1. Download the plugin ZIP file.
2. Go to **Plugins → Add New → Upload Plugin**.
3. Upload the ZIP file and click **Install Now**.
4. Click **Activate**.

= Requirements =

* WordPress 6.0 or higher.
* PHP 7.4 or higher.
* **Elementor** (free or Pro) installed and active.

== Frequently Asked Questions ==

= What JSON format does the widget expect? =

The widget expects JSON with a `labels` array and a `datasets` array. Each dataset needs at least a `label` and a `data` array of numbers:

```
{
  "labels": ["Q1", "Q2", "Q3"],
  "datasets": [
    {
      "label": "Revenue",
      "data": [150, 210, 180]
    }
  ]
}
```

Invalid JSON shows a clear error message instead of breaking the page.

= Which chart types are supported? =

Bar, Line, Pie, Doughnut, Polar Area and Radar. All of them are selected from a dropdown in the widget settings.

= Can I customize the colors? =

Yes. By default a palette of ten colors is applied automatically. To use custom colors, add `backgroundColor` (and optionally `borderColor`) to any dataset in your JSON.

= Does it work in the Elementor editor preview? =

Yes, the chart renders live in the editor preview, so you can see changes while editing.

= Which libraries does it use? =

The charts are powered by **Chart.js v4**, bundled locally with the plugin. Elementor itself is required.

= Is my data shared with third parties? =

No. Your JSON is embedded in the page and rendered entirely client-side. Chart.js is bundled locally, so no external resource is loaded.

= Does it work with any theme? =

Yes. The widget works with any theme compatible with Elementor.

== Screenshots ==

1. Widget settings in the Elementor editor: chart type, JSON data, title, height and legend options.
2. A bar chart rendered on the frontend.
3. A pie chart rendered on the frontend.
4. A line chart rendered on the frontend.

== Changelog ==

= 1.0.3 =
* Bundle Chart.js locally instead of loading it from the jsDelivr CDN, to comply with the wordpress.org resource offloading rules.

= 1.0.2 =
* Fix "Tested up to" to use the major/minor format required by wordpress.org checks.
* Merge the Italian documentation into a single bilingual README to pass the automated review.

= 1.0.1 =
* Rename plugin to DataCharts to comply with the wordpress.org "WP" naming restriction.
* Update text domain and all internal namespaces accordingly.

= 1.0.0 =
* Initial release.
* Add Elementor widget "Chart" with 6 chart types (bar, line, pie, doughnut, polar area, radar).
* JSON data input with syntax highlighting and validation.
* Automatic color palette with per-dataset overrides.
* Configurable title, legend and chart height.

== Upgrade Notice ==

= 1.0.3 =
Chart.js is now bundled locally. No functional changes, just update the plugin.

= 1.0.2 =
Fix the readme to pass the automated plugin checks. No functional changes.

= 1.0.1 =
Rename to DataCharts to comply with the wordpress.org naming rules. Simply update: the widget settings are preserved.

= 1.0.0 =
Initial release.