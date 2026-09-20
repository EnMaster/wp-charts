# WP Charts

> Crea grafici (barre, linea, torta, anello, polar area, radar) interattivi e responsive a partire da dati JSON, direttamente nelle tue pagine Elementor.

**WP Charts** aggiunge un widget **Grafico** al page builder Elementor. Incolla i tuoi dati in formato JSON nelle impostazioni del widget, scegli il tipo di grafico e il plugin renderizza un grafico interattivo e responsive basato su [Chart.js](https://www.chartjs.org/).

- [Requisiti](#requisiti)
- [Installazione](#installazione)
- [Utilizzo](#utilizzo)
- [Formato dei dati JSON](#formato-dei-dati-json)
- [Opzioni](#opzioni)
- [Privacy](#privacy)
- [FAQ](#faq)
- [Changelog](#changelog)
- [Licenza](#licenza)

---

## Requisiti

- WordPress 6.0 o superiore
- PHP 7.4 o superiore
- **Elementor** (gratuito o Pro) installato e attivo

## Installazione

### Automatica

1. Vai su **Plugin → Aggiungi nuovo** nella tua Area Admin WordPress.
2. Cerca **"WP Charts"**.
3. Clicca **Installa ora**, poi **Attiva**.

### Manuale

1. Scarica il file ZIP del plugin.
2. Vai su **Plugin → Aggiungi nuovo → Carica plugin**.
3. Carica il file ZIP e clicca **Installa ora**, poi **Attiva**.

## Utilizzo

1. Apri una pagina (o un modello) nell'editor di Elementor.
2. Cerca nel pannello widget **"Grafico"** (o **"Chart"**) — lo trovi nella categoria **WP Charts**.
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

WP Charts **non** raccoglie, memorizza, elabora o trasmette alcun dato personale. I tuoi JSON vengono incorporati direttamente nella pagina ed elaborati interamente lato client. L'unica risorsa esterna è la libreria Chart.js caricata dalla CDN jsDelivr.

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
Chart.js v4, caricata dalla CDN jsDelivr.

**I miei dati vengono condivisi con terze parti?**
No. Viene scaricata dalla CDN solo la libreria Chart.js; i tuoi dati non lasciano mai la pagina.

**Funziona con qualsiasi tema?**
Qualunque tema compatibile con Elementor.

## Changelog

### 1.0.0

- Versione iniziale.
- Widget "Grafico" per Elementor con 6 tipi di grafico (barre, linea, torta, anello, polar area, radar).
- Inserimento dati JSON con evidenziazione della sintassi e validazione.
- Palette automatica di colori con override per singolo dataset.
- Titolo, legenda e altezza configurabili.

## Licenza

[GPL-2.0-or-later](./LICENSE.txt)