# 📚 Arkusze egzaminacyjne

Zbiór arkuszy i materiałów do praktycznych egzaminów zawodowych z informatyki. Repozytorium gromadzi zadania z kolejnych lat oraz pliki pomocne podczas ich rozwiązywania i nauki.

## ✨ Co znajdziesz w repozytorium?

- 📄 arkusze egzaminacyjne w formacie PDF
- 💻 przykładowe strony i rozwiązania w HTML, CSS oraz PHP
- 🗄️ pliki baz danych SQL i CSV
- 🖼️ grafiki, diagramy i inne materiały do zadań
- 🗓️ materiały z lat 2021–2026, z sesji wiosennych i zimowych

W zależności od zadania folder może zawierać sam arkusz albo także część materiałów i plików rozwiązania. Zawartość nie jest jednakowa dla wszystkich egzaminów.

## 🧱 Technologie i formaty

- **HTML i CSS** – strony internetowe
- **PHP** – zadania z aplikacjami serwerowymi
- **SQL i CSV** – bazy danych i dane
- **PDF, PNG, JPG, XCF i inne** – arkusze oraz materiały graficzne
- **XAMPP** – przykładowe lokalne środowisko do uruchamiania zadań PHP

## 📋 Wymagania

- Git — do sklonowania repozytorium
- Przeglądarka PDF — do przeglądania arkuszy
- XAMPP lub równoważne środowisko z Apache i PHP — do uruchamiania zadań internetowych
- MySQL/MariaDB — tylko dla zadań korzystających z bazy danych

## 🚀 Pobranie i uruchomienie

Poniższe kroki zakładają Windows i XAMPP zainstalowany w `C:\xampp`.

### 1. Sklonuj repozytorium

Otwórz terminal i przejdź do katalogu `htdocs`:

```bash
cd C:\xampp\htdocs
git clone https://github.com/Bartek-Piechnik/Arkusze-egzaminacyjne.git
```

### 2. Wybierz egzamin

Materiały są uporządkowane według roku, sesji i oznaczenia egzaminu:

```text
ROK\SESJA\KOD-EGZAMINU\
```

Przykładowa ścieżka:

```text
2026\Zima\INF.03-01-26.01-SG\
```

Otwórz znajdujący się tam plik PDF, aby zapoznać się z arkuszem. Jeśli folder zawiera pliki `HTML`, `CSS`, `PHP`, `Baza` lub `Grafiki`, są to materiały związane z danym zadaniem.

### 3. Uruchom zadanie internetowe

1. W XAMPP Control Panel uruchom **Apache**.
2. Jeśli zadanie korzysta z bazy danych, uruchom również **MySQL**.
3. Odszukaj stronę startową zadania, na przykład `PHP\index.php` albo `HTML\index.html`.
4. Otwórz ją przez adres `localhost`, zachowując ścieżkę folderów. Dla przykładowego zadania będzie to:

   ```text
   http://localhost/Arkusze-egzaminacyjne/2026/Zima/INF.03-01-26.01-SG/PHP/index.php
   ```

   Dostosuj końcówkę adresu do pliku startowego, który znajduje się w wybranym folderze. Pliki PHP uruchamiaj przez Apache, a nie bezpośrednio z dysku.

### 4. Zaimportuj bazę danych, jeśli jest potrzebna

1. Otwórz [phpMyAdmin](http://localhost/phpmyadmin).
2. Utwórz bazę danych wymaganą przez wybrane zadanie — nazwę można znaleźć w treści arkusza lub konfiguracji połączenia w plikach PHP.
3. W zakładce **Import** wybierz odpowiedni plik `.sql` z folderu `Baza` tego zadania.
4. Jeśli połączenie z bazą nie działa, sprawdź host, użytkownika, hasło i nazwę bazy w plikach zadania. Konfiguracja może różnić się między egzaminami.

## 📁 Struktura repozytorium

```text
├── 2021/
├── 2022/
├── 2023/
├── 2024/
├── 2025/
├── 2026/
│   └── Zima/
│       └── INF.03-01-26.01-SG/
│           ├── Baza/       # pliki baz danych, jeśli są potrzebne
│           ├── CSS/        # arkusze stylów
│           ├── Grafiki/    # grafiki i pozostałe materiały
│           ├── PHP/        # pliki aplikacji PHP
│           ├── HTML/       # pliki stron HTML
│           └── *.pdf       # arkusz egzaminacyjny
└── README.md
```

Nie każdy folder egzaminu zawiera wszystkie wymienione podfoldery.

## 🎯 Do czego służy projekt?

Repozytorium ma charakter edukacyjny i pomaga przygotować się do praktycznych egzaminów zawodowych. Rozwiązania i materiały warto traktować jako pomoc w nauce, a zadania wykonywać samodzielnie przed sprawdzeniem przykładowych plików.
