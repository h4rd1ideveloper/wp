Viewup Wordpress Theme
======================

Este é o tema base para projetos WordPress. Ele é baseado no projeto [underscores](http://underscores.me/).

## Instalação

Clone este repositório usando:

```
git clone --depth 1 --recursive -j8 git@192.168.25.2:sites/up-wp-theme.git
cd up-wp-theme
```

Instale as dependências do projeto:

```
git submodule update --init --recursive
```

Elimine o link com o repositório:

```
rm -rf .git .gitmodules inc/customizer-generator/.git inc/customizer-generator/kirki/.git inc/plugin-activation/.git
```
Copie este repositório e renomeie-o para o nome do seu tema (ex: `my-up-theme`). Depois, siga os seguintes passos:

1. Procure por: `'verthos'` e substitua por: `'my-up-theme'`
2. Procure por: `_verthos_` e substitua por: `my_up_theme_`
3. Procure por: `Text Domain: _verthos` e substitua por: `Text Domain: my-up-theme` no arquivo `style.css`.
4. Procure por: <code>&nbsp;_s</code> e substitua por: <code>&nbsp;My_up_Theme</code>
5. Procure por: `_s-` e substitua por: `my-up-theme-`

Depois, atualize o cabeçalho do CSS em `style.css` para as informações do tema. Depois, atualize este arquivo `README.md` com as informações para desenvolvedores (Git, etc).

## Contribuir

Para contribuir, faça pull-requests no branch `develop`. Após versão estável, faça `merge --no-ff` para o master e crie uma tag.