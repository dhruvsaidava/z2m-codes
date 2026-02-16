# Z2M Codes - Arduino & Basic Programming Repository

![Z2M Codes](https://img.shields.io/badge/Arduino-Code%20Repository-00979D?style=for-the-badge&logo=arduino&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)

A beautiful, modern, and responsive code repository platform for Arduino and basic programming codes. Perfect for students, hobbyists, and makers to explore, learn, and share code examples.

## 🌟 Features

- **📚 Comprehensive Code Library** - Browse through a collection of Arduino and programming codes
- **🔍 Smart Search & Filter** - Find codes by title, description, tags, category, or difficulty level
- **🎨 Beautiful UI** - Modern and responsive design with Tailwind CSS
- **💡 Syntax Highlighting** - Color-coded Arduino code with Highlight.js
- **📋 One-Click Copy** - Copy code to clipboard with a single click
- **📱 Mobile Responsive** - Works perfectly on all devices
- **🏷️ Categorized Content** - Organized by Arduino Basics, Sensors, Motors, LEDs, IoT, and Communication
- **⚡ Fast & Lightweight** - Built with core PHP for speed and simplicity

## 📂 Project Structure

```
z2m-codes/
├── assets/
│   ├── images/
│   │   ├── zero2maker-logo.png  # Site logo
│   │   └── z2m.svg              # Alternative logo
│   └── js/
│       └── main.js              # JavaScript for interactivity
├── data/
│   └── codes.php                # Code repository data
├── includes/
│   ├── header.php               # Header component
│   ├── footer.php               # Footer component
│   └── navbar.php               # Navigation component
├── .htaccess                    # Apache configuration
├── config.php                   # Site configuration
├── index.php                    # Homepage
├── codes.php                    # Code listing page
├── view-code.php                # Individual code view
└── README.md                    # Documentation
```

## 🚀 Getting Started

### Prerequisites

- **XAMPP** / **WAMP** / **LAMP** (Apache + PHP 7.4+)
- Modern web browser (Chrome, Firefox, Safari, Edge)

### Installation

1. **Clone or download this repository** to your XAMPP `htdocs` folder:
   ```bash
   cd C:\xampp\htdocs
   git clone https://github.com/yourusername/z2m-codes.git
   ```
   
   Or simply extract the ZIP file to `C:\xampp\htdocs\z2m-codes`

2. **Start Apache** from XAMPP Control Panel

3. **Open your browser** and navigate to:
   ```
   http://localhost/z2m-codes
   ```

That's it! Your code repository is now live! 🎉

## 📖 Usage Guide

### Browsing Codes

1. **Homepage** - View featured codes and categories
2. **All Codes** - Browse the complete code library
3. **Filter by Category** - Click on category cards or use the dropdown filter
4. **Search** - Use the search bar to find specific codes
5. **View Code** - Click "View Code" to see full details and copy the code

### Adding New Codes

To add new code examples, edit `data/codes.php` and add a new array entry:

```php
[
    'id' => 9,  // Unique ID
    'title' => 'Your Code Title',
    'description' => 'Brief description of what this code does',
    'category' => 'arduino-basics',  // Category key
    'difficulty' => 'beginner',  // beginner, intermediate, or advanced
    'tags' => ['Tag1', 'Tag2', 'Tag3'],  // Relevant tags
    'components' => ['Arduino Uno', 'LED', 'Resistor'],  // Required components
    'code' => 'void setup() {
    // Your Arduino code here
}

void loop() {
    // Main code
}',
    'author' => 'Your Name',
    'date' => '2024-03-15'  // Date in YYYY-MM-DD format
]
```

### Adding New Categories

Edit `config.php` and add to the `$categories` array:

```php
'new-category' => [
    'name' => 'New Category Name',
    'icon' => '🔥',  // Emoji icon
    'description' => 'Category description'
]
```

## 🎨 Customization

### Change Site Name and Description

Edit `config.php`:

```php
define('SITE_NAME', 'Your Site Name');
define('SITE_DESCRIPTION', 'Your site description');
define('BASE_URL', 'http://localhost/your-folder');
```

### Modify Colors

The site uses a purple gradient theme. To change colors, edit the Tailwind classes in the PHP files:

- `gradient-bg` - Main gradient background
- `bg-purple-600` - Primary color
- `text-purple-600` - Primary text color

Or add custom CSS in `includes/header.php` within the `<style>` tag.

### Change Code Syntax Theme

The site uses Atom One Dark theme for code highlighting. To change it, edit `includes/header.php` and replace the Highlight.js theme CSS:

```html
<!-- Replace the theme URL -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
```

Browse themes at: https://highlightjs.org/static/demo/

## 🔧 Configuration

### config.php

Main configuration file with:
- Site settings (name, description, URL)
- Category definitions
- Difficulty level settings
- Helper functions for filtering and retrieving codes

### data/codes.php

Contains all code examples as PHP arrays. Each code entry includes:
- Unique ID
- Title and description
- Category and difficulty
- Tags for searchability
- Required components
- Complete Arduino code
- Author and date

## 📱 Responsive Design

The site is fully responsive and works on:
- 📱 Mobile devices (320px+)
- 📱 Tablets (768px+)
- 💻 Laptops (1024px+)
- 🖥️ Desktops (1280px+)

## 🛠️ Technologies Used

- **PHP** - Server-side scripting
- **Tailwind CSS** - Utility-first CSS framework
- **Highlight.js** - Syntax highlighting for code blocks
- **Vanilla JavaScript** - Interactive features
- **HTML5** - Semantic markup

## 📚 Code Categories

1. **🔌 Arduino Basics** - Fundamental Arduino programming concepts
2. **📡 Sensors** - Working with various sensor modules
3. **⚙️ Motors & Servos** - Control motors and servo mechanisms
4. **💡 LEDs & Display** - LED patterns and display modules
5. **🌐 IoT Projects** - Internet of Things applications
6. **📱 Communication** - Serial, I2C, SPI, Bluetooth, WiFi

## 🤝 Contributing

Want to contribute? Great! Here's how:

1. Fork the repository
2. Add your code examples to `data/codes.php`
3. Test locally
4. Submit a pull request

**Code Contribution Guidelines:**
- Follow the existing code structure
- Include clear comments in Arduino code
- Provide accurate component lists
- Test your code before submitting

## 📄 License

This project is open source and free to use for educational purposes.

## 👨‍💻 Author

**Z2M Codes Team**

## 🙏 Acknowledgments

- Arduino Community for inspiring examples
- Tailwind CSS for the beautiful styling system
- Highlight.js for syntax highlighting
- All contributors and code authors

## 📞 Support

If you encounter any issues or have questions:

1. Check existing codes in the repository
2. Review this README documentation
3. Contact the maintainer

## 🔮 Future Enhancements

- [ ] User authentication and code submission
- [ ] Code rating and comments system
- [ ] Download codes as .ino files
- [ ] Circuit diagram integration
- [ ] Video tutorials
- [ ] API for code access
- [ ] Dark mode toggle
- [ ] Multi-language support

---

**Made with ❤️ for the maker community**

*Happy Coding! 🚀*

