# DataCharts

> Display beautiful, responsive charts (bar, line, pie, doughnut, polar area, radar) built from JSON data, right inside your Elementor pages.

> Crea grafici (barre, linea, torta, anello, polar area, radar) interattivi e responsive a partire da dati JSON, direttamente nelle tue pagine Elementor.

**DataCharts** adds a **Chart** widget to the Elementor page builder. Paste your data as JSON in the widget settings, pick the chart type, and the plugin renders an interactive, responsive chart powered by [Chart.js](https://www.chartjs.org/).

**DataCharts** aggiunge un widget **Grafico** al page builder Elementor. Incolla i tuoi dati in formato JSON nelle impostazioni del widget, scegli il tipo di grafico e il plugin renderizza un grafico interattivo e responsive basato su [Chart.js](https://www.chartjs.org/).

- [English](#english)
- [Italiano](#italiano)

---

# English

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [JSON data format](#json-data-format)
- [Options](#options)
- [Privacy](#privacy)
- [FAQ](#faq)
- [Changelog](#changelog)
- [License](#license)

## Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- **Elementor** (free or Pro) installed and active

## Installation

### Automatic

1. Go to **Plugins → Add New** in your WordPress admin.
2. Search for **"DataCharts"**.
3. Click **Install Now**, then **Activate**.

### Manual

1. Download the plugin ZIP file.
2. Go to **Plugins → Add New → Upload Plugin**.
3. Upload the ZIP file and click **Install Now**, then **Activate**.

## Usage

1. Open a page (or template) in the Elementor editor.
2. Search the widget panel for **"Chart"** (or **"Grafico"**) — you'll find it in the **DataCharts** category.
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

DataCharts does **not** collect, store, process or transmit any personal data. Your JSON is embedded directly in the page and rendered entirely client-side. Chart.js is bundled locally with the plugin — no external resources are loaded.

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
Chart.js v4, bundled locally with the plugin.

**Is my data shared with third parties?**
No. Everything runs locally on your site; your data never leaves the page.

**Does it work with any theme?**
Any theme compatible with Elementor.

## Changelog

### 1.0.3

- Chart.js is now bundled locally instead of being loaded from the jsDelivr CDN, complying with the wordpress.org resource offloading rules.

### 1.0.2

- Fix "Tested up to" to use the major/minor format required by wordpress.org checks.
- Merged the Italian documentation into this single bilingual README.

### 1.0.1

- Renamed the plugin to DataCharts to comply with the wordpress.org naming rules.
- Updated text domain and internal namespaces accordingly.

### 1.0.0

- Initial release.
- Elementor "Chart" widget with 6 chart types (bar, line, pie, doughnut, polar area, radar).
- JSON data input with syntax highlighting and validation.
- Automatic color palette with per-dataset overrides.
- Configurable title, legend and chart height.

## License

[GPL-2.0-or-later](./LICENSE.txt)

---

# Italiano

- [Requisiti](#requisiti)
- [Installazione](#installazione)
- [Utilizzo](#utilizzo)
- [Formato dei dati JSON](#formato-dei-dati-json)
- [Opzioni](#opzioni)
- [Privacy](#privacy)
- [FAQ](#faq-1)
- [Changelog](#changelog-1)
- [Licenza](#licenza)

## Requisiti

- WordPress 6.0 o superiore
- PHP 7.4 o superiore
- **Elementor** (gratuito o Pro) installato e attivo

## Installazione

### Automatica

1. Vai su **Plugin → Aggiungi nuovo** nella tua Area Admin WordPress.
2. Cerca **"DataCharts"**.
3. Clicca **Installa ora**, poi **Attiva**.

### Manuale

1. Scarica il file ZIP del plugin.
2. Vai su **Plugin → Aggiungi nuovo → Carica plugin**.
3. Carica il file ZIP e clicca **Installa ora**, poi **Attiva**.

## Utilizzo

1. Apri una pagina (o un modello) nell'editor di Elementor.
2. Cerca nel pannello widget **"Grafico"** (o **"Chart"**) — lo trovi nella categoria **DataCharts**.
3. Scegli il **tipo di grafico** (Barre, Linea, Torta, Anello, Polar Area, Radar).
4. Incolla i tuoi **dati JSON** nel campo *Dati (JSON)*.
5. Imposta facoltativamente **titolo**, **altezza** e **legenda**.
6. Clicca **Aggiorna**: il grafico viene renderizzato nel frontend (e in anteprima nell'editor).

## Formato dei dati JSON

Il widget prevede un array `labels` e uno o più `datasets`:

```json
{
  "labels": ["Gennaio", "Febbraio", "Marzo"],
  "datasets": [
    {
      "label": "Vendite",
      "data": [120, 190, 90]
    },
    {
      "label": "Ordini",
      "data": [80, 110, 130]
    }
  ]
}
```

I grafici **torta**, **anello** e **polar area** usano solo il primo dataset; ogni fetta riceve automaticamente un colore diverso.

### Colori personalizzati (opzionale)

Puoi sovrascrivere la palette automatica per ogni dataset:

```json
{
  "labels": ["Q1", "Q2", "Q3"],
  "datasets": [
    {
      "label": "Ricavi",
      "data": [150, 210, 180],
      "backgroundColor": "#4e79a7",
      "borderColor": "#2f4f6f"
    }
  ]
}
```

Un JSON non valido non rompe mai la pagina: viene mostrato un messaggio di errore chiaro.

## Opzioni

| Opzione | Descrizione |
| --- | --- |
| Tipo di grafico | `bar` (barre), `line` (linea), `pie` (torta), `doughnut` (anello), `polarArea`, `radar` |
| Titolo | Titolo facoltativo mostrato sopra il grafico |
| Dati (JSON) | I dati del grafico nel formato descritto sopra |
| Altezza (px) | Altezza della tela canvas, da 100 a 2000 px |
| Mostra legenda | Mostra/nascondi la legenda |
| Posizione legenda | `top` (sopra), `bottom` (sotto), `left` (sinistra), `right` (destra) |

## Privacy

DataCharts **non** raccoglie, memorizza, elabora o trasmette alcun dato personale. I tuoi JSON vengono incorporati direttamente nella pagina ed elaborati interamente lato client. Chart.js è incluso nel plugin — non viene caricata alcuna risorsa esterna.

## FAQ

**Che formato JSON prevede il widget?**
Un array `labels` e un array `datasets` in cui ogni dataset ha un `label` (etichetta) e un array numerico `data`.

**Quali tipi di grafico sono supportati?**
Barre, Linea, Torta, Anello, Polar Area e Radar.

**Posso personalizzare i colori?**
Sì — aggiungi `backgroundColor` (e facoltativamente `borderColor`) a qualunque dataset.

**Funziona nella anteprima dell'editor?**
Sì, il grafico viene renderizzato in tempo reale durante la modifica.

**Quale libreria renderizza i grafici?**
Chart.js v4, incluso localmente nel plugin.

**I miei dati vengono condivisi con terze parti?**
No. Tutto viene eseguito localmente sul tuo sito; i tuoi dati non lasciano mai la pagina.

**Funziona con qualsiasi tema?**
Qualunque tema compatibile con Elementor.

## Changelog

### 1.0.3

- Chart.js ora incluso localmente nel plugin invece di essere caricato dalla CDN jsDelivr, in conformità con le regole wordpress.org sul caricamento delle risorse.

### 1.0.2

- Corretto "Tested up to" al formato maggiori/minori richiesto dai controlli di wordpress.org.
- Documentazione italiana unificata in questo unico README bilingue.

### 1.0.1

- Rinomina del plugin in DataCharts per rispettare le regole di naming di wordpress.org.
- Aggiornato il text domain e tutti i namespace interni di conseguenza.

### 1.0.0

- Versione iniziale.
- Widget "Grafico" per Elementor con 6 tipi di grafico (barre, linea, torta, anello, polar area, radar).
- Inserimento dati JSON con evidenziazione della sintassi e validazione.
- Palette automatica di colori con override per singolo dataset.
- Titolo, legenda e altezza configurabili.

## Licenza

[GPL-2.0-or-later](./LICENSE.txt)