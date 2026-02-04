import {Node} from '@tiptap/core';

export default Node.create({
    name: 'heroicon',
    group: 'inline',
    inline: true,
    atom: true,

    addAttributes() {
        return {
            icon: {
                default: null,
                parseHTML: el => el.getAttribute('data-icon'),
                renderHTML: attrs => ({
                    'data-icon': attrs.icon,
                }),
            },
            svg: {
                default: null,
                parseHTML: el => el.getAttribute('data-svg'),
                renderHTML: attrs => ({
                    'data-svg': attrs.svg,
                }),
            },
        }
    },

    parseHTML() {
        return [{ tag: 'span[data-svg]' }];
    },

    renderHTML({ HTMLAttributes }) {
        return ['span', HTMLAttributes, 0 ];
    },

    addNodeView() {
        return ({ node }) => {
            const span = document.createElement('span');
            span.innerHTML = node.attrs.svg || '<span>[Icon SVG missing!]</span>';
            span.style.display = 'inline-block';

            return {
                dom: span,
            };
        };
    },

    addCommands() {
        return {
            heroicon:
                attrs =>
                    ({ commands }) =>
                        commands.insertContent({
                            type: 'heroicon',
                            attrs: attrs,
                        }),
        };
    },
});
