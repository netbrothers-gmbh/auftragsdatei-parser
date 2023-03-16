![build status](https://github.com/netbrothers-gmbh/auftragsdatei-parser/actions/workflows/build-workflow.yml/badge.svg) ![release status](https://github.com/netbrothers-gmbh/auftragsdatei-parser/actions/workflows/release-workflow.yml/badge.svg)

# About Auftragsdatei-Parser

Auftragsdatei-Parser parses GKV Auftragsdatei files (`.AUF` files) and presents
their content in various formats.

# Installation

Download the latest binary (`aufparser.phar`) from the [release page](https://github.com/netbrothers-gmbh/auftragsdatei-parser/releases) and make it executable.

```
chmod +x aufparser.phar
```

Optionally [place the file in your PATH directory](https://zwbetz.com/how-to-add-a-binary-to-your-path-on-macos-linux-windows/).

# Usage

## Help

Get help using the `--help` option.

```
./aufparser.phar --help
```

## Parse a file

Parsing an `.AUF` file is straightforward.

```
./aufparser.phar ESOL001.AUF
```

## Output Formats

Auftragsdatei-Parser provides three output formats.

1. Table (Default)

```
./aufparser.phar ESOL001.AUF                 # implicit
./aufparser.phar ESOL001.AUF --format=table  # explicit
```

2. Compact JSON

```
./aufparser.phar ESOL001.AUF --format=json
```

3. Pretty JSON

```
./aufparser.phar ESOL001.AUF --format=jsonpretty
```

# Example Output

```
+------------------------------------+----------------------------------------+
| Key                                | Value                                  |
+------------------------------------+----------------------------------------+
| IDENTIFIKATOR                      | 500000                                 |
| VERSION                            | 01                                     |
| LAENGE_AUFTRAG                     | 00000348                               |
| SEQUENZ_NR                         | 000                                    |
| VERFAHREN_KENNUNG                  | EPFL0                                  |
| TRANSFER_NUMMER                    | 000                                    |
| VERFAHREN_KENNUNG_SPEZIFIKATION    |                                        |
| ABSENDER_EIGNER                    | 123456789                              |
| ABSENDER_PHYSIKALISCH              | 123456789                              |
| EMPFAENGER_NUTZER                  | 987654321                              |
| EMPFAENGER_PHYSIKALISCH            | 987654321                              |
| FEHLER_NUMMER                      | 000000                                 |
| FEHLER_MASSNAHME                   | 000000                                 |
| DATEINAME                          | EPFL0000                               |
| DATUM_ERSTELLUNG                   | 20220911142002                         |
| DATUM_UEBERTRAGUNG_GESENDET        | 20220911142002                         |
| DATUM_UEBERTRAGUNG_EMPFANGEN_START | 00000000000000                         |
| DATUM_UEBERTRAGUNG_EMPFANGEN_ENDE  | 00000000000000                         |
| DATEIVERSION                       | 000000                                 |
| KORREKTUR                          | 0                                      |
| DATEIGROESSE_NUTZDATEN             | 000000015884                           |
| DATEIGROESSE_UEBERTRAGUNG          | 000000015884                           |
| ZEICHENSATZ                        | I1                                     |
| KOMPRIMIERUNG                      | 00                                     |
| VERSCHLUESSELUNGSART               | 03                                     |
| ELEKTRONISCHE_UNTERSCHRIFT         | 03                                     |
| SATZFORMAT                         |                                        |
| SATZLAENGE                         | 00000                                  |
| BLOCKLAENGE                        | 00000000                               |
| STATUS                             |                                        |
| WIEDERHOLUNG                       |                                        |
| UEBERTRAGUNGSWEG                   |                                        |
| VERZOEGERTERVERSAND                |                                        |
| INFOUNDFEHLERFELDER                |                                        |
| VARIABLESINFOFELD                  |                                        |
| EMAILADRESSEABSENDER               |                                        |
| DATEI_BEZEICHNUNG                  |                                        |
+------------------------------------+----------------------------------------+
```

# Author

[Thilo Ratnaweera, NetBrothers GmbH](https://netbrothers.de)

[![nb.logo](https://netbrothers.de/wp-content/uploads/2020/12/netbrothers_logo.png)](https://netbrothers.de)
