# WP Charts

> Display beautiful, responsive charts (bar, line, pie, doughnut, polar area, radar) built from JSON data, right inside your Elementor pages.

**WP Charts** adds a **Chart** widget to the Elementor page builder. Paste your data as JSON in the widget settings, pick the chart type, and the plugin renders an interactive, responsive chart powered by [Chart.js](https://www.chartjs.org/).

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [JSON data format](#json-data-format)
- [Options](#options)
- [Privacy](#privacy)
- [FAQ](#faq)
- [Changelog](#changelog)
- [License](#license)

---

## Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- **Elementor** (free or Pro) installed and active

## Installation

### Automatic

1. Go to **Plugins → Add New** in your WordPress admin.
2. Search for **"WP Charts"**.
3. Click **Install Now**, then **Activate**.

### Manual

1. Download the plugin ZIP file.
2. Go to **Plugins → Add New → Upload Plugin**.
3. Upload the ZIP file and click **Install Now**, then **Activate**.

## Usage

1. Open a page (or template) in the Elementor editor.
2. Search the widget panel for **"Chart"** (or **"Grafico"**) — you'll find it in the **WP Charts** category.
3. Choose the **chart type** (Bar, Line, Pie, Doughnut, Polar Area, Radar).
4. Paste your **JSON data** into the *Data (JSON)* field.
5. Optionally set the **title**, **height** and **legend** options.
6. Click **Update** and the chart renders on the frontend (and live in the editor preview).

## JSON data format

The widget expects a `labels` array and one or more `datasets`:

```json
{
  "labels": ["January", "February", "March"],
  "datasets": [
    {
      "label": "Sales",
      "data": [120, 190, 90]
    },
    {
      "label": "Orders",
      "data": [80, 110, 130]
    }
  ]
}
```

**Pie**, **doughnut** and **polar area** charts use only the first dataset; each slice gets its own color automatically.

### Custom colors (optional)

You can override the automatic palette per dataset:

```json
{
  "labels": ["Q1", "Q2", "Q3"],
  "datasets": [
    {
      "label": "Revenue",
      "data": [150, 210, 180],
      "backgroundColor": "#4e79a7",
      "borderColor": "#2f4f6f"
    }
  ]
}
```

Invalid JSON never breaks the page — a clear error message is shown instead.

## Options

| Option | Description |
| --- | --- |
| Chart type | `bar`, `line`, `pie`, `doughnut`, `polarArea`, `radar` |
| Title | Optional title displayed above the chart |
| Data (JSON) | The chart data in the format described above |
| Height (px) | Canvas height, from 100 to 2000 px |
| Show legend | Show/hide the legend |
| Legend position | `top`, `bottom`, `left`, `right` |

## Privacy

WP Charts does **not** collect, store, process or transmit any personal data. Your JSON is embedded directly in the page and rendered entirely client-side. The only external resource is the Chart.js library from the jsDelivr CDN.

## FAQ

**What JSON format does the widget expect?**
A `labels` array and a `datasets` array where each dataset has a `label` and a numeric `data` array.

**Which chart types are supported?**
Bar, Line, Pie, Doughnut, Polar Area and Radar.

**Can I customize colors?**
Yes — add `backgroundColor` (and optionally `borderColor`) to any dataset.

**Does it work in the editor preview?**
Yes, the chart renders live while you edit.

**Which library renders the charts?**
Chart.js v4, loaded from the jsDelivr CDN.

**Is my data shared with third parties?**
No. Only the Chart.js script is fetched from the CDN; your data never leaves the page.

**Does it work with any theme?**
Any theme compatible with Elementor.

## Changelog

### 1.0.0

- Initial release.
- Elementor "Chart" widget with 6 chart types (bar, line, pie, doughnut, polar area, radar).
- JSON data input with syntax highlighting and validation.
- Automatic color palette with per-dataset overrides.
- Configurable title, legend and chart height.

## License

[GPL-2.0-or-later](./LICENSE.txt)