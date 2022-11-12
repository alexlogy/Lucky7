# CSIT314 - Software Development Methodologies (Group Project)

## Setup Development Environment

### MacOS

#### Setting up

Run the following command in your MAC terminal to install Homebrew (MacOS Package Manager)
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

Install PHP8.0
```bash
brew install php@8.0
```

Install Composer
```bash
brew install composer
```

Add Binaries to PATH ENV
```bash
echo 'export PATH="/opt/homebrew/opt/php@8.0/bin:$PATH"' >> ~/.zshrc
echo 'export PATH="/opt/homebrew/opt/php@8.0/sbin:$PATH"' >> ~/.zshrc
echo 'export PATH="${HOME}/.composer/vendor/bin:$PATH"' >> ~/.zshrc
```

Reload Bash Profile
```bash
source ~/.zshrc
```

#### Start Development Server

```bash
php artisan serve
```

### Windows
