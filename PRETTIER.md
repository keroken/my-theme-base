# Prettier Code Formatting

This WordPress theme project is configured with Prettier for automatic code formatting.

## Available Scripts

- `npm run format` - Format all files in the project
- `npm run format:check` - Check if files are formatted correctly (useful for CI)
- `npm run format:php` - Format only PHP files
- `npm run format:css` - Format only CSS files
- `npm run format:js` - Format only JavaScript files

## Usage

### Format all files:

```bash
npm run format
```

### Check formatting without changing files:

```bash
npm run format:check
```

### Format specific file types:

```bash
npm run format:php
npm run format:css
```

## Configuration

- **Configuration file**: `.prettierrc.json`
- **Ignore file**: `.prettierignore`
- **Supported file types**: PHP, CSS, JavaScript, JSON

## Settings

- 2 spaces for indentation
- Single quotes for JavaScript
- Double quotes for CSS
- Semicolons enabled
- 80 character line width
- PHP 7.4+ syntax support

## VS Code Integration

To enable automatic formatting on save in VS Code, add this to your settings:

```json
{
  "editor.formatOnSave": true,
  "editor.defaultFormatter": "esbenp.prettier-vscode"
}
```
