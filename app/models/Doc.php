<?php
namespace app\models;

use renderpage\libs\Model;

class Doc extends Model
{
    /**
     * Get table of Contents.
     *
     * @return array
     */
    public function getContents()
    {
        $contents = [
            ['chapter' => 'Методы класса View', 'items' => [
                    'setVar()',
                    'addCss()',
                    'addScript()',
                    'render()'
                ]
            ],
            ['chapter' => 'Методы класса DB', 'items' => [
                    'getArray()',
                    'getRow()',
                    'insert()',
                    'truncate()'
                ]
            ]
        ];

        return $contents;
    }

    /**
     * Get refentry.
     *
     * @return array
     */
    public function getRefentry()
    {
        ini_set('highlight.comment', '#7f9f7f');
        ini_set('highlight.default', '#dcdccc');
        ini_set('highlight.html', '#808080');
        ini_set('highlight.keyword', '#dfc47d; font-weight: bold');
        ini_set('highlight.string', '#cc9393');

        $refentry = [];
        $filename = APP_DIR . '/data/doc/classes/view/method.render.xml';
        $xml = simplexml_load_file($filename);

        $refentry['name'] = $xml->name;
        $refentry['purpose'] = $xml->purpose;
        $refentry['methodsynopsis']['return'] = $xml->methodsynopsis->return;
        $refentry['methodsynopsis']['name'] = $xml->methodsynopsis->name;

        foreach ($xml->methodsynopsis->param as $methodparam) {
            $refentry['methodsynopsis']['params'][] = [
                'type' => $methodparam->type,
                'name' => $methodparam->name,
                'initializer' => $methodparam->initializer
            ];
        }

        $refentry['description'] = $xml->description;

        foreach ($xml->examples->example as $example) {
            $refentry['examples'][] = [
                'title' => $example->title,
                'programlisting' => highlight_string($example->programlisting, true)
            ];
        }

        return $refentry;
    }
}
