<?php
/**
 * Config file for PHP CS Fixer.
 *
 * @package Config - PHP CS Fixer
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2019 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

/**
 * Rules to be implemented by PHP CS Fixer.
 *
 * @see https://mlocati.github.io/php-cs-fixer-configurator/#version:2.15
 */
$rules = [
    /**
     * Each line of multi-line DocComments must have an asterisk [PSR-5] and must be aligned with the first one.
     *
     * @property string comment_type Whether to fix PHPDoc comments only (`phpdocs_only`), any multi-line comment whose
     *                               lines all start with an asterisk (`phpdocs_like`) or any multi-line comment
     *                               (`all_multiline`);
     *                               default: 'phpdocs_only'
     */
    'align_multiline_comment' => [
        'comment_type' => 'all_multiline',
    ],

    /**
     * Each element of an array must be indented exactly once.
     */
    'array_indentation' => true,

    /**
     * PHP arrays should be declared using the configured syntax.
     *
     * @property string syntax Whether to use the `long` or `short` array syntax;
     *                         default: 'long'
     */
    'array_syntax' => [
        'syntax' => 'short',
    ],

    /**
     * Converts backtick operators to `shell_exec` calls.
     */
    'backtick_to_shell_exec' => false,

    /**
     * Binary operators should be surrounded by space as configured.
     *
     * @property bool align_double_arrow Whether to apply, remove or ignore double arrows alignment;
     *                                   default: false
     * @property bool align_equals       Whether to apply, remove or ignore equals alignment;
     *                                   default: false
     */
    'binary_operator_spaces' => [
        'align_double_arrow' => false,
        'align_equals' => false,
    ],

    /**
     * There MUST be one blank line after the namespace declaration.
     */
    'blank_line_after_namespace' => true,

    /**
     * Ensure there is no code on the same line as the PHP open tag and it is followed by a blank line.
     */
    'blank_line_after_opening_tag' => true,

    /**
     * An empty line feed should precede a return statement.
     *
     * @deprecated Use `blank_line_before_statement`
     */
    'blank_line_before_return' => false,

    /**
     * An empty line feed must precede any configured statement.
     *
     * @property array statements List of statements which must be preceded by an empty line;
     *                            default: ['break', 'continue', 'declare', 'return', 'throw', 'try']
     */
    'blank_line_before_statement' => [
        'statements' => [
            'break',
            'continue',
            'declare',
            'return',
            'throw',
            'try',
        ],
    ],

    /**
     * The body of each structure MUST be enclosed by braces. Braces should be properly placed. Body of braces should
     * be properly indented.
     *
     * @property bool   allow_single_line_closure                   Whether single line lambda notation should be
     *                                                              allowed;
     *                                                              default: false
     * @property string position_after_anonymous_constructs         Whether the opening brace should be placed on
     *                                                              "next" or "same" line after anonymous constructs
     *                                                              (anonymous classes and lambda functions);
     *                                                              default: 'same'
     * @property string position_after_control_structures           Whether the opening brace should be placed on
     *                                                              "next" or "same" line after control structures
     *                                                              default: 'same'
     * @property string position_after_functions_and_oop_constructs Whether the opening brace should be placed on
     *                                                              "next" or "same" line after classy constructs
     *                                                              (non-anonymous classes, interfaces, traits, methods
     *                                                              and non-lambda functions)
     *                                                              default: 'next'
     */
    'braces' => [
        'allow_single_line_closure' => false,
        'position_after_anonymous_constructs' => 'same',
        'position_after_control_structures' => 'same',
        'position_after_functions_and_oop_constructs' => 'next',
    ],

    /**
     * A single space or none should be between cast and variable.
     *
     * @property string space Spacing to apply between cast and variable;
     *                        default: 'single'
     */
    'cast_spaces' => [
        'space' => 'none',
    ],

    /**
     * Class, trait and interface elements must be separated with one blank line.
     *
     * @property array elements List of classy elements; 'const', 'method', 'property';
     *                          default: ['const', 'method', 'property']
     */
    'class_attributes_separation' => [
        'elements' => [
            'const',
            'method',
            'property',
        ],
    ],

    /**
     * Whitespace around the keywords of a class, trait or interface's definition should be one space.
     *
     * @property bool multi_line_extends_each_single_line Whether definitions should be multiline;
     *                                                    default: false
     * @property bool single_item_single_line             Whether definitions should be single line when including a
     *                                                    single item;
     *                                                    default: false
     * @property bool single_line                         Whether definitions should be single line;
     *                                                    default: false
     */
    'class_definition' => [
        'multi_line_extends_each_single_line' => false,
        'single_item_single_line' => false,
        'single_line' => false,
    ],

    /**
     * Converts `::class` keywords to FQCN strings.
     */
    'class_keyword_remove' => false,

    /**
     * Using `isset($var) &&` multiple times should be done in one call.
     */
    'combine_consecutive_issets' => true,

    /**
     * Calling `unset` on multiple items should be done in one call.
     */
    'combine_consecutive_unsets' => true,

    /**
     * Replace multiple nested calls of `dirname` by only one call with second `$level` parameter. Requires PHP >= 7.0.
     *
     * Risky when the function `dirname` is overridden.
     */
    'combine_nested_dirname' => false,

    /**
     * Comments with annotation should be docblock when used on structural elements.
     *
     * Risky as new docblocks might mean more (e.g.: a Doctrine entity might have a new column in database).
     */
    'comment_to_phpdoc' => true,

    /**
     * Remove extra spaces in a nullable typehint.
     */
    'compact_nullable_typehint' => true,

    /**
     * Concatenation should be spaced according configuration.
     *
     * @property string spacing Spacing to apply around concatenation operator;
     *                          default: 'none'
     */
    'concat_space' => [
        'spacing' => 'one',
    ],

    /**
     * Class `DateTimeImmutable` should be used instead of `DateTime`.
     *
     * Risky when the code relies on modifying `DateTime` objects or if any of the `date_create*` functions are
     * overridden.
     */
    'date_time_immutable' => true,

    /**
     * Equal sign in declare statement should be surrounded by spaces or not following configuration.
     *
     * @property string space Spacing to apply around the equal sign;
     *                        default: 'none'
     */
    'declare_equal_normalize' => [
        'space' => 'none',
    ],

    /**
     * Force strict types declaration in all files. Requires PHP >= 7.0.
     *
     * Risky: forcing strict types will stop non strict code from working.
     */
    'declare_strict_types' => true,

    /**
     * Replaces `dirname(__FILE__) expression with equivalent __DIR__ constant.
     *
     * Risky when the function dirname is overridden.
     */
    'dir_constant' => true,

    /**
     * Doctrine annotations must use configured operator for assignment in arrays.
     *
     * @property array  ignored_tags List of tags that must not be treated as Doctrine Annotations;
     *                               default: ['abstract', 'access', 'code', 'deprec', 'encode', 'exception', 'final',
     *                               'ingroup', 'inheritdoc', 'inheritDoc', 'magic', 'name', 'toc', 'tutorial',
     *                               'private', 'static', 'staticvar', 'staticVar', 'throw', 'api', 'author',
     *                               'category', 'copyright', 'deprecated', 'example', 'filesource', 'global',
     *                               'ignore', 'internal', 'license', 'link', 'method', 'package', 'param', 'property',
     *                               'property-read', 'property-write', 'return', 'see', 'since', 'source',
     *                               'subpackage', 'throws', 'todo', 'TODO', 'usedBy', 'uses', 'var', 'version',
     *                               'after', 'afterClass', 'backupGlobals', 'backupStaticAttributes', 'before',
     *                               'beforeClass', 'codeCoverageIgnore', 'codeCoverageIgnoreStart',
     *                               'codeCoverageIgnoreEnd', 'covers', 'coversDefaultClass', 'coversNothing',
     *                               'dataProvider', 'depends', 'expectedException', 'expectedExceptionCode',
     *                               'expectedExceptionMessage', 'expectedExceptionMessageRegExp', 'group', 'large',
     *                               'medium', 'preserveGlobalState', 'requires', 'runTestsInSeparateProcesses',
     *                               'runInSeparateProcess', 'small', 'test', 'testdox', 'ticket', 'uses',
     *                               'SuppressWarnings', 'noinspection', 'package_version', 'enduml', 'startuml',
     *                               'fix', 'FIXME', 'fixme', 'override']
     * @property string operator    The operator to use;
     *                              default: '='
     */
    'doctrine_annotation_array_assignment' => false,

    /**
     * Doctrine annotations without arguments must use the configured syntax.
     *
     * @property array  ignored_tags List of tags that must not be treated as Doctrine Annotations.
     *                               default: ['abstract', 'access', 'code', 'deprec', 'encode', 'exception', 'final',
     *                               'ingroup', 'inheritdoc', 'inheritDoc', 'magic', 'name', 'toc', 'tutorial',
     *                               'private', 'static', 'staticvar', 'staticVar', 'throw', 'api', 'author',
     *                               'category', 'copyright', 'deprecated', 'example', 'filesource', 'global',
     *                               'ignore', 'internal', 'license', 'link', 'method', 'package', 'param', 'property',
     *                               'property-read', 'property-write', 'return', 'see', 'since', 'source',
     *                               'subpackage', 'throws', 'todo', 'TODO', 'usedBy', 'uses', 'var', 'version',
     *                               'after', 'afterClass', 'backupGlobals', 'backupStaticAttributes', 'before',
     *                               'beforeClass', 'codeCoverageIgnore', 'codeCoverageIgnoreStart',
     *                               'codeCoverageIgnoreEnd', 'covers', 'coversDefaultClass', 'coversNothing',
     *                               'dataProvider', 'depends', 'expectedException', 'expectedExceptionCode',
     *                               'expectedExceptionMessage', 'expectedExceptionMessageRegExp', 'group', 'large',
     *                               'medium', 'preserveGlobalState', 'requires', 'runTestsInSeparateProcesses',
     *                               'runInSeparateProcess', 'small', 'test', 'testdox', 'ticket', 'uses',
     *                               'SuppressWarnings', 'noinspection', 'package_version', 'enduml', 'startuml',
     *                               'fix', 'FIXME', 'fixme', 'override']
     * @property string syntax      Whether to add or remove braces;
     *                              default: 'without_braces'
     */
    'doctrine_annotation_braces' => false,

    /**
     * Doctrine annotations must be indented with four spaces.
     *
     * @property array ignored_tags       List of tags that must not be treated as Doctrine Annotations.
     *                                    default: ['abstract', 'access', 'code', 'deprec', 'encode', 'exception',
     *                                    'final', 'ingroup', 'inheritdoc', 'inheritDoc', 'magic', 'name', 'toc',
     *                                    'tutorial', 'private', 'static', 'staticvar', 'staticVar', 'throw', 'api',
     *                                    'author', 'category', 'copyright', 'deprecated', 'example', 'filesource',
     *                                    'global', 'ignore', 'internal', 'license', 'link', 'method', 'package',
     *                                    'param', 'property', 'property-read', 'property-write', 'return', 'see',
     *                                    'since', 'source', 'subpackage', 'throws', 'todo', 'TODO', 'usedBy', 'uses',
     *                                    'var', 'version', 'after', 'afterClass', 'backupGlobals',
     *                                    'backupStaticAttributes', 'before', 'beforeClass', 'codeCoverageIgnore',
     *                                    'codeCoverageIgnoreStart', 'codeCoverageIgnoreEnd', 'covers',
     *                                    'coversDefaultClass', 'coversNothing', 'dataProvider', 'depends',
     *                                    'expectedException', 'expectedExceptionCode', 'expectedExceptionMessage',
     *                                    'expectedExceptionMessageRegExp', 'group', 'large', 'medium',
     *                                    'preserveGlobalState', 'requires', 'runTestsInSeparateProcesses',
     *                                    'runInSeparateProcess', 'small', 'test', 'testdox', 'ticket', 'uses',
     *                                    'SuppressWarnings', 'noinspection', 'package_version', 'enduml', 'startuml',
     *                                    'fix', 'FIXME', 'fixme', 'override']
     * @property bool  indent_mixed_lines Whether to indent lines that have content before closing parenthesis;
     *                                    default: false
     */
    'doctrine_annotation_indentation' => false,

    /**
     * Fixes spaces in Doctrine annotations.
     *
     * @property bool after_argument_assignments      Whether to add, remove or ignore spaces after argument assignment
     *                                                operator;
     *                                                default: false
     * @property bool after_array_assignments_colon   Whether to add, remove or ignore spaces after array assignment
     *                                                `:` operator;
     *                                                default: true
     * @property bool after_array_assignments_equals  Whether to add, remove or ignore spaces after array assignment
     *                                                `=` operator;
     *                                                default: true
     * @property bool around_argument_assignments     Whether to fix spaces around argument assignment operator;
     *                                                default: true
     * @property bool around_array_assignments        Whether to fix spaces around array assignment operators;
     *                                                default: true
     * @property bool around_commas                   Whether to fix spaces around commas;
     *                                                default: true
     * @property bool around_parentheses              Whether to fix spaces around parentheses;
     *                                                default: true
     * @property bool before_argument_assignments     Whether to add, remove or ignore spaces before argument
     *                                                assignment operator;
     *                                                default: false
     * @property bool before_array_assignments_colon  Whether to add, remove or ignore spaces before array `:`
     *                                                assignment operator;
     *                                                default: true
     * @property bool before_array_assignments_equals Whether to add, remove or ignore spaces before array `=`
     *                                                assignment operator;
     *                                                default: true
     * @property array ignored_tags                   List of tags that must not be treated as Doctrine Annotations;
     *                                                default: ['abstract', 'access', 'code', 'deprec', 'encode',
     *                                                'exception', 'final', 'ingroup', 'inheritdoc', 'inheritDoc',
     *                                                'magic', 'name', 'toc', 'tutorial', 'private', 'static',
     *                                                'staticvar', 'staticVar', 'throw', 'api', 'author', 'category',
     *                                                'copyright', 'deprecated', 'example', 'filesource', 'global',
     *                                                'ignore', 'internal', 'license', 'link', 'method', 'package',
     *                                                'param', 'property', 'property-read', 'property-write', 'return',
     *                                                'see', 'since', 'source', 'subpackage', 'throws', 'todo', 'TODO',
     *                                                'usedBy', 'uses', 'var', 'version', 'after', 'afterClass',
     *                                                'backupGlobals', 'backupStaticAttributes', 'before',
     *                                                'beforeClass', 'codeCoverageIgnore', 'codeCoverageIgnoreStart',
     *                                                'codeCoverageIgnoreEnd', 'covers', 'coversDefaultClass',
     *                                                'coversNothing', 'dataProvider', 'depends', 'expectedException',
     *                                                'expectedExceptionCode', 'expectedExceptionMessage',
     *                                                'expectedExceptionMessageRegExp', 'group', 'large', 'medium',
     *                                                'preserveGlobalState', 'requires', 'runTestsInSeparateProcesses',
     *                                                'runInSeparateProcess', 'small', 'test', 'testdox', 'ticket',
     *                                                'uses', 'SuppressWarnings', 'noinspection', 'package_version',
     *                                                'enduml', 'startuml', 'fix', 'FIXME', 'fixme', 'override']
     */
    'doctrine_annotation_spaces' => false,

    /**
     * The keyword `elseif` should be used instead of `else if` so that all control keywords look like single words.
     */
    'elseif' => true,

    /**
     * PHP code MUST use only UTF-8 without BOM (remove BOM).
     */
    'encoding' => true,

    /**
     * Replace deprecated `ereg` regular expression functions with `preg`.
     *
     * Risky if `ereg` function is overridden.
     */
    'ereg_to_preg' => false,

    /**
     * Error control operator should be added to deprecation notices and/or removed from other cases.
     *
     * Risky because adding/removing `@` might cause changes to code behaviour or if `trigger_error` function is
     * overridden.
     *
     * @property bool mute_deprecation_error          Whether to add `@` in deprecation notices;
     *                                                default: true
     * @property bool noise_remaining_usages          Whether to remove `@` in remaining usages;
     *                                                default: false
     * @property array noise_remaining_usages_exclude List of global functions to exclude from removing `@`;
     *                                                default: []
     */
    'error_suppression' => false,

    /**
     * Escape implicit backslashes in strings and heredocs to ease the understanding of which are special chars
     * interpreted by PHP and which not.
     *
     * @property bool double_quoted  Whether to fix double-quoted strings;
     *                               default: true
     * @property bool heredoc_syntax Whether to fix heredoc syntax;
     *                               default: true
     * @property bool single_quoted  Whether to fix single-quoted strings;
     *                               default: false
     */
    'escape_implicit_backslashes' => false,

    /**
     * Add curly braces to indirect variables to make them clear to understand. Requires PHP >= 7.0.
     */
    'explicit_indirect_variable' => true,

    /**
     * Converts implicit variables into explicit ones in double-quoted strings or heredoc syntax.
     */
    'explicit_string_variable' => true,

    /**
     * All classes must be final, except abstract ones and Doctrine entities.
     *
     * Risky when subclassing non-abstract classes.
     */
    'final_class' => false,

    /**
     * Internal classes should be `final`.
     *
     * Risky: changing classes to `final` might cause code execution to break.
     *
     * @property array annotation-black-list                     Class level annotations tags that must be omitted to
     *                                                           fix the class, even if all of the white list ones are
     *                                                           used as well (case insensitive);
     *                                                           default: ['@final', '@Entity', '@ORM\\Entity']
     * @property array annotation-white-list                     Class level annotations tags that must be set in order
     *                                                           to fix the class (case insensitive);
     *                                                           default: ['@internal']
     * @property bool consider-absent-docblock-as-internal-class Should classes without any DocBlock be fixed to final?
     *                                                           default: false
     */
    'final_internal_class' => false,

    /**
     * Order the flags in `fopen` calls, `b` and `t` must be last.
     *
     * Risky when the function `fopen` is overridden.
     */
    'fopen_flag_order' => false,

    /**
     * The flags in `fopen` calls must omit `t`, and `b` must be omitted or included consistently.
     *
     * Risky when the function `fopen` is overridden.
     */
    'fopen_flags' => false,

    /**
     * PHP code must use the long <?php tags or short-echo <?= tags and not other tag variations.
     */
    'full_opening_tag' => true,

    /**
     * Transforms imported FQCN parameters and return types in function arguments to short version.
     */
    'fully_qualified_strict_types' => true,

    /**
     * Spaces should be properly placed in a function declaration.
     *
     * @property string closure_function_spacing Spacing to use before open parenthesis for closures;
     *                                           default: 'one'
     */
    'function_declaration' => [
        'closure_function_spacing' => 'one',
    ],

    /**
     * Replace core functions calls returning constants with the constants.
     *
     * Risky when any of the configured functions to replace are overridden.
     *
     * @property array functions List of function names to fix;
     *                           default: ['get_class', 'php_sapi_name', 'phpversion', 'pi']
     */
    'function_to_constant' => false,

    /**
     * Ensure single space between function's argument and its typehint.
     */
    'function_typehint_space' => true,

    /**
     * Configured annotations should be omitted from PHPDoc.
     *
     * @property array annotations List of annotations to remove (e.g.: ['author']);
     *                             default: []
     */
    'general_phpdoc_annotation_remove' => false,

    /**
     * Single line comments should use double slashes `//` and not hash `#`.
     *
     * @deprecated Use `single_line_comment_style`
     */
    'hash_to_slash_comment' => false,

    /**
     * Add, replace or remove header comment.
     *
     * @property string comment_type Comment syntax type;
     *                               default: 'comment'
     * @property string header       Proper header content;
     *                               default: ''
     * @property string location     The location of the inserted header;
     *                               default: 'after_declare_strict'
     * @property string separate     Whether the header should be separated from the file content with a new line;
     *                               default: 'both'
     */
    'header_comment' => false,

    /**
     * Heredoc/nowdoc content must be properly indented. Requires PHP >= 7.3.
     */
    'heredoc_indentation' => false,

    /**
     * Convert `heredoc` to `nowdoc` where possible.
     */
    'heredoc_to_nowdoc' => true,

    /**
     * Function `implode` must be called with 2 arguments in the documented order.
     *
     * Risky when the function `implode` is overridden.
     */
    'implode_call' => true,

    /**
     * Include/Require and file path should be divided with a single space. File path should not be placed under
     * brackets.
     */
    'include' => true,

    /**
     * Pre- or post-increment and decrement operators should be used if possible.
     *
     * @property string style Whether to use pre- or post-increment and decrement operators;
     *                        default: 'pre'
     */
    'increment_style' => [
        'style' => 'post',
    ],

    /**
     * Code MUST use configured indentation type.
     */
    'indentation_type' => true,

    /**
     * Replaces `is_null($var)` expression with `null === $var`.
     *
     * Risky when the function `is_null` is overridden.
     */
    'is_null' => [ //
        'use_yoda_style' => false,
    ],

    /**
     * All PHP files must use same line ending.
     */
    'line_ending' => true,

    /**
     * Ensure there is no code on the same line as the PHP open tag.
     */
    'linebreak_after_opening_tag' => false,

    /**
     * List (`array` destructuring) assignment should be declared using the configured syntax. Requires PHP >= 7.1.
     *
     * @property string syntax Whether to use the `long` or `short list` syntax;
     *                         default: 'long'
     */
    'list_syntax' => [
        'syntax' => 'long',
    ],

    /**
     * Use `&&` and `||` logical operators instead of `and` and `or`.
     *
     * Risky, because you must double-check if using and/or with lower precedence was intentional.
     */
    'logical_operators' => true,

    /**
     * Cast should be written in lower case.
     */
    'lowercase_cast' => true,

    /**
     * The PHP constants `true`, `false`, and `null` MUST be in lower case.
     */
    'lowercase_constants' => true,

    /**
     * PHP keywords MUST be in lower case.
     */
    'lowercase_keywords' => true,

    /**
     * Class static references `self`, `static` and `parent` MUST be in lower case.
     */
    'lowercase_static_reference' => true,

    /**
     * Magic constants should be referred to using the correct casing.
     */
    'magic_constant_casing' => true,

    /**
     * Magic method definitions and calls must be using the correct casing.
     */
    'magic_method_casing' => true,

    /**
     * Replace non multibyte-safe functions with corresponding mb function.
     *
     * Risky when any of the functions are overridden.
     */
    'mb_str_functions' => true,

    /**
     * In method arguments and method call, there MUST NOT be a space before each comma and there MUST be one space
     * after each comma. Argument lists MAY be split across multiple lines, where each subsequent line is indented
     * once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument
     * per line.
     *
     * @property bool   after_heredoc                    Whether the whitespace between heredoc end and comma should be
     *                                                   removed;
     *                                                   default: false
     * @property bool   ensure_fully_multiline           Ensure every argument of a multiline argument list is on its
     *                                                   own line;
     *                                                   default: false
     * @property bool   keep_multiple_spaces_after_comma Whether keep multiple spaces after comma;
     *                                                   default: false
     * @property string on_multiline                     Defines how to handle function arguments lists that contain
     *                                                   newlines;
     *                                                   default: 'ignore'
     */
    'method_argument_space' => [
        'after_heredoc' => false,
        'ensure_fully_multiline' => false,
        'keep_multiple_spaces_after_comma' => false,
        'on_multiline' => 'ensure_fully_multiline',
    ],

    /**
     * Method chaining MUST be properly indented. Method chaining with different levels of indentation is not
     * supported.
     */
    'method_chaining_indentation' => true,

    /**
     * Methods must be separated with one blank line.
     *
     * @deprecated Use `class_attributes_separation`
     */
    'method_separation' => false,

    /**
     * Replaces `intval`, `floatval`, `doubleval`, `strval` and `boolval` function calls with according type casting
     * operator.
     *
     * Risky if any of the functions `intval`, `floatval`, `doubleval`, `strval` or `boolval` are overridden.
     */
    'modernize_types_casting' => true,

    /**
     * DocBlocks must start with two asterisks, multiline comments must start with a single asterisk, after the opening
     * slash. Both must end with a single asterisk before the closing slash.
     */
    'multiline_comment_opening_closing' => true,

    /**
     * Forbid multi-line whitespace before the closing semicolon or move the semicolon to the new line for chained
     * calls.
     *
     * @property string strategy Forbid multi-line whitespace or more the semicolon to the new line for chained calls;
     *                           default: 'no_multi_line'
     */
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
    ],

    /**
     * Add leading `\` before constant invocation of internal constant to speed up resolving. Constant name match is
     * case-sensitive, except for `null`, `false` and `true`.
     *
     * Risky when any of the constants are namespaced or overridden.
     *
     * @property array  exclude      List of constants to ignore;
     *                               default: ['null', 'false', 'true']
     * @property bool   fix_built_in Whether to fix constants returned by `get_defined_constants`. User constants are
     *                               not accounted in this list and must be specified in the include one;
     *                               default: true
     * @property array  include      List additional constants to fix;
     *                               default: []
     * @property string scope        Only fix constant invocations that are made within a namespace or fix all;
     *                               default: 'all'
     */
    'native_constant_invocation' => false,

    /**
     * Function defined by PHP should be called using the correct casing.
     */
    'native_function_casing' => true,

    /**
     * Add leading `\` before function invocation to speed up resolving.
     *
     * Risky when any of the functions are overridden.
     */
    'native_function_invocation' => false,

    /**
     * Native type hints for functions should use the correct case.
     */
    'native_function_type_declaration_casing' => true,

    /**
     * All instances created with new keyword must be followed by braces.
     */
    'new_with_braces' => true,

    /**
     * Master functions shall be used instead of aliases.
     *
     * Risky when any of the alias functions are overridden.
     *
     * @property array sets List of sets to fix. Defined sets are `@internal` (native functions), `@IMAP` (IMAP
     *                      functions), `@mbreg` (from `ext-mbstring`) `@all` (all listed sets);
     *                      default: ['@internal`, `@IMAP`]
     */
    'no_alias_functions' => [
        'sets' => [
            '@internal',
            '@IMAP',
        ],
    ],

    /**
     * Replace control structure alternative syntax to use braces.
     */
    'no_alternative_syntax' => true,

    /**
     * There should not be a binary flag before strings.
     */
    'no_binary_string' => true,

    /**
     * There should be no empty lines after class opening brace.
     */
    'no_blank_lines_after_class_opening' => true,

    /**
     * There should not be blank lines between docblock and the documented element.
     */
    'no_blank_lines_after_phpdoc' => true,

    /**
     * There should be no blank lines before a namespace declaration.
     */
    'no_blank_lines_before_namespace' => false,

    /**
     * There must be a comment when fall-through is intentional in a non-empty case body.
     *
     * @property string comment_text The text to use in the added comment and to detect it;
     *                               default: 'no break'
     */
    'no_break_comment' => [
        'comment_text' => 'no break',
    ],

    /**
     * The closing `?>` tag MUST be omitted from files containing only PHP.
     */
    'no_closing_tag' => true,

    /**
     * There should not be any empty comments.
     */
    'no_empty_comment' => true,

    /**
     * There should not be empty PHPDoc blocks.
     */
    'no_empty_phpdoc' => true,

    /**
     * Remove useless semicolon statements.
     */
    'no_empty_statement' => true,

    /**
     * Removes extra blank lines and/or blank lines following configuration.
     *
     * @property array tokens List of tokens to fix;
     *                        default: ['extra']
     */
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
        ],
    ],

    /**
     * Removes extra blank lines and/or blank lines following configuration.
     *
     * @deprecated Use `no_extra_blank_lines`
     */
    'no_extra_consecutive_blank_lines' => false,

    /**
     * Replace accidental usage of homoglyphs (non ascii characters) in names.
     *
     * Risky: renames classes and cannot rename the files; you might have string references to renamed code (`$$name`).
     */
    'no_homoglyph_names' => true,

    /**
     * Remove leading slashes in `use` clauses.
     */
    'no_leading_import_slash' => true,

    /**
     * The namespace declaration line shouldn't contain leading whitespace.
     */
    'no_leading_namespace_whitespace' => true,

    /**
     * Either language construct `print` or `echo` should be used.
     *
     * @property string use The desired language construct;
     *                      default: 'echo'
     */
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],

    /**
     * Operator `=>` should not be surrounded by multi-line whitespaces.
     */
    'no_multiline_whitespace_around_double_arrow' => true,

    /**
     * Multi-line whitespace before closing semicolon are prohibited.
     *
     * @deprecated Use `multiline_whitespace_before_semicolons`
     */
    'no_multiline_whitespace_before_semicolons' => false,

    /**
     * Properties MUST not be explicitly initialized with `null`.
     */
    'no_null_property_initialization' => true,

    /**
     * Convert PHP4-style constructors to `__construct`.
     *
     * Risky when old style constructor being fixed is overridden or overrides parent.
     */
    'no_php4_constructor' => true,

    /**
     * Short cast `bool` using double exclamation mark should not be used.
     */
    'no_short_bool_cast' => true,

    /**
     * Replace short-echo `<?=` with long format `<?php echo` syntax.
     */
    'no_short_echo_tag' => true,

    /**
     * Single-line whitespace before closing semicolon are prohibited.
     */
    'no_singleline_whitespace_before_semicolons' => true,

    /**
     * When making a method or function call, there MUST NOT be a space between the method or function name and the
     * opening parenthesis.
     */
    'no_spaces_after_function_name' => true,

    /**
     * There MUST NOT be spaces around offset braces.
     *
     * @property array positions Whether spacing should be fixed inside and/or outside the offset braces;
     *                           default: ['inside', 'outside']
     */
    'no_spaces_around_offset' => [
        'positions' => [
            'inside',
            'outside',
        ],
    ],

    /**
     * There MUST NOT be a space after the opening parenthesis. There MUST NOT be a space before the closing
     * parenthesis.
     */
    'no_spaces_inside_parenthesis' => true,

    /**
     * Replaces superfluous `elseif` with `if`.
     */
    'no_superfluous_elseif' => true,

    /**
     * Removes `@param` and `@return` tags that don't provide any useful information.
     *
     * @property bool allow_mixed Whether type `mixed` without description is allowed (`true`) or considered
     *                            superfluous (`false`);
     *                            default: false
     */
    'no_superfluous_phpdoc_tags' => false,

    /**
     * Remove trailing commas in list function calls.
     */
    'no_trailing_comma_in_list_call' => true,

    /**
     * PHP single-line arrays should not have trailing comma.
     */
    'no_trailing_comma_in_singleline_array' => true,

    /**
     * Remove trailing whitespace at the end of non-blank lines.
     */
    'no_trailing_whitespace' => true,

    /**
     * There MUST be no trailing spaces inside comment or PHPDoc.
     */
    'no_trailing_whitespace_in_comment' => true,

    /**
     * Removes unneeded parentheses around control statements.
     *
     * @property array statements List of control statements to fix;
     *                            default: ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case',
     *                            'yield']
     */
    'no_unneeded_control_parentheses' => [
        'statements' => [
            'break',
            'clone',
            'continue',
            'echo_print',
            'return',
            'switch_case',
            'yield',
        ],
    ],

    /**
     * Removes unneeded curly braces that are superfluous and aren't part of a control structure's body.
     */
    'no_unneeded_curly_braces' => true,

    /**
     * A final class must not have final methods.
     */
    'no_unneeded_final_method' => true,

    /**
     * In function arguments there must not be arguments with default values before non-default ones.
     *
     * Risky: modifies the signature of functions; therefore risky when using systems (such as some Symfony components)
     * that rely on those (for example through reflection).
     */
    'no_unreachable_default_argument_value' => false,

    /**
     * Variables must be set `null` instead of using `(unset)` casting.
     */
    'no_unset_cast' => true,

    /**
     * Properties should be set to `null` instead of using `unset`.
     *
     * Risky: changing variables to `null` instead of unsetting them will mean they still show up when looping over
     * class variables.
     */
    'no_unset_on_property' => false,

    /**
     * Unused `use` statements must be removed.
     */
    'no_unused_imports' => true,

    /**
     * There should not be useless `else` cases.
     */
    'no_useless_else' => true,

    /**
     * There should not be an empty `return` statement at the end of a function.
     */
    'no_useless_return' => true,

    /**
     * In array declaration, there MUST NOT be a whitespace before each comma.
     *
     * @property bool after_heredoc Whether the whitespace between heredoc end and comma should be removed;
     *                              default: false
     */
    'no_whitespace_before_comma_in_array' => [
        'after_heredoc' => false,
    ],

    /**
     * Remove trailing whitespace at the end of blank lines.
     */
    'no_whitespace_in_blank_line' => true,

    /**
     * Remove Zero-width space (ZWSP), Non-breaking space (NBSP) and other invisible unicode symbols.
     *
     * Risky when strings contain intended invisible characters.
     *
     * @property bool use_escape_sequences_in_strings Whether characters should be replaced with escape sequences in
     *                                                strings;
     *                                                default: false
     */
    'non_printable_character' => [
        'use_escape_sequences_in_strings' => false,
    ],

    /**
     * Array index should always be written by using square braces.
     */
    'normalize_index_brace' => true,

    /**
     * Logical NOT operators (`!`) should have leading and trailing whitespaces.
     */
    'not_operator_with_space' => false,

    /**
     * Logical NOT operators (`!`) should have one trailing whitespace.
     */
    'not_operator_with_successor_space' => false,

    /**
     * There should not be space before or after object `T_OBJECT_OPERATOR ->`.
     */
    'object_operator_without_whitespace' => true,

    /**
     * Orders the elements of classes/interfaces/traits.
     *
     * @property array order          List of strings defining order of elements;
     *                                default: ['use_trait', 'constant_public', 'constant_protected',
     *                                'constant_private', 'property_public', 'property_protected', 'property_private',
     *                                'construct', 'destruct', 'magic', 'phpunit', 'method_public', 'method_protected',
     *                                'method_private']
     * @property string sortAlgorithm How multiple occurrences of same type statements should be sorted;
     *                                default: 'none'
     */
    'ordered_class_elements' => [
        'order' => [
            'use_trait',
            'constant_public',
            'constant_protected',
            'constant_private',
            'property_public',
            'property_protected',
            'property_private',
            'construct',
            'destruct',
            'magic',
            'phpunit',
            'method_public',
            'method_protected',
            'method_private',
        ],
        'sortAlgorithm' => 'alpha',
    ],

    /**
     * Ordering `use` statements.
     *
     * @property array|null imports_order  Defines the order of import types;
     *                                     default: null
     * @property string     sort_algorithm Whether the statements should be sorted alphabetically or by length, or not
     *                                     sorted;
     *                                     default: 'alpha'
     */
    'ordered_imports' => [
        'imports_order' => [
            'class',
            'function',
            'const',
        ],
        'sort_algorithm' => 'alpha',
    ],

    /**
     * Orders the interfaces in an `implements` or `interface` extends clause.
     *
     * Risky for `implements` when specifying both an interface and its parent interface, because PHP doesn't break on
     * `parent, child` but does on `child, parent`
     *
     * @property string direction Which direction the interfaces should be ordered;
     *                            default: 'ascend'
     * @property string order     How the interfaces should be ordered;
     *                            default: 'alpha'
     */
    'ordered_interfaces' => [
        'direction' => 'ascend',
        'order' => 'alpha',
    ],

    /**
     * PHPUnit assertion method calls like `->assertSame(true, $foo)` should be written with dedicated method like
     * `->assertTrue($foo)`.
     *
     * Risky: fixer could be risky if one is overriding PHPUnit's native methods.
     *
     * @property array assertions List of assertion methods to fix;
     *                            default: ['assertEquals', 'assertSame', 'assertNotEquals', 'assertNotSame']
     */
    'php_unit_construct' => [
        'assertions' => [
            'assertEquals',
            'assertSame',
            'assertNotEquals',
            'assertNotSame',
        ],
    ],

    /**
     * PHPUnit assertions like `assertInternalType`, `assertFileExists`, should be used over `assertTrue`.
     *
     * Risky: fixer could be risky if one is overriding PHPUnit's native methods.
     *
     * @property array|null functions List of assertions to fix (overrides `target`);
     *                                default: null
     * @property string     target    Target version of PHPUnit;
     *                                default: '5.0'
     */
    'php_unit_dedicate_assert' => [
        'functions' => null,
        'target' => 'newest',
    ],

    /**
     * PHPUnit assertions like `assertIsArray` should be used over `assertInternalType`.
     *
     * Risky when PHPUnit methods are overridden or when project has PHPUnit incompatibilities.
     *
     * @property string target Target version of PHPUnit;
     *                         default: 'newest'
     */
    'php_unit_dedicate_assert_internal_type' => [
        'target' => 'newest',
    ],

    /**
     * Usages of `->setExpectedException*` methods MUST be replaced by `->expectException*` methods.
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     *
     * @property string target Target version of PHPUnit;
     *                         default: 'newest'
     */
    'php_unit_expectation' => [
        'target' => 'newest',
    ],

    /**
     * PHPUnit annotations should be a FQCNs including a root namespace.
     */
    'php_unit_fqcn_annotation' => false,

    /**
     * All PHPUnit test classes should be marked as internal.
     *
     * @property array types What types of classes to mark as internal;
     *                       default: ['normal', 'final']
     */
    'php_unit_internal_class' => [
        'types' => [
            'normal',
            'final',
        ],
    ],

    /**
     * Enforce camel (or snake) case for PHPUnit test methods, following configuration.
     *
     * @property string case Apply camel or snake case to test methods;
     *                       default: 'camel_case'
     */
    'php_unit_method_casing' => [
        'case' => 'camel_case',
    ],

    /**
     * Usages of `->getMock` and `->getMockWithoutInvokingTheOriginalConstructor` methods MUST be replaced by
     * `->createMock` or `->createPartialMock` methods.
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     *
     * @property string target Target version of PHPUnit;
     *                         default: 'newest'
     */
    'php_unit_mock' => [
        'target' => 'newest',
    ],

    /**
     * Usage of PHPUnit's mock (e.g.: `->will($this->returnValue(...))`) must be replaced by its shorter equivalent
     * such as `->willReturn(...)`.
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     */
    'php_unit_mock_short_will_return' => true,

    /**
     * PHPUnit classes MUST be used in namespaced version (e.g.: `\PHPUnit\Framework\TestCase` instead of
     * `\PHPUnit_Framework_TestCase`).
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     *
     * @property string target Target version of PHPUnit;
     *                         default: 'newest'
     */
    'php_unit_namespaced' => [
        'target' => 'newest',
    ],

    /**
     * Usages of `@expectedException*` annotations MUST be replaced by `->setExpectedException*` methods.
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     *
     * @property string target          Target version of PHPUnit;
     *                                  default: 'newest'
     * @property bool   use_class_const Use `::class` notation;
     *                                  default: true
     */
    'php_unit_no_expectation_annotation' => false,

    /**
     * Order `@covers` annotation of PHPUnit tests.
     */
    'php_unit_ordered_covers' => true,

    /**
     * Changes the visibility of the `setUp()` and `tearDown()` functions of PHPUnit to protected, to match the PHPUnit
     * TestCase.
     *
     * Risky: this fixer may change functions named `setUp()` or `tearDown()` outside of PHPUnit tests when a class is
     * wrongly seen as a PHPUnit test.
     */
    'php_unit_set_up_tear_down_visibility' => true,

    /**
     * All PHPUnit test cases should have `@small`, `@medium` or `@large` annotation to enable run time limits.
     *
     * @property string group Define a specific group to be used in case no group is already in use;
     *                        default: 'small'
     */
    'php_unit_size_class' => [
        'group' => 'small',
    ],

    /**
     * PHPUnit methods like `assertSame` should be used instead of `assertEquals`.
     *
     * Risky when any of the functions are overridden or when testing object equality.
     *
     * @property array assertions List of assertion methods to fix;
     *                            default: ['assertAttributeEquals', 'assertAttributeNotEquals', 'assertEquals',
     *                            'assertNotEquals']
     */
    'php_unit_strict' => false,

    /**
     * Adds or removes `@test` annotations from tests, following configuration.
     *
     * Risky: this fixer may change the name of your tests, and could cause incompatibility with abstract classes or
     * interfaces.
     *
     * @property string case  Whether to camel or snake case when adding the test prefix;
     *                        default: 'camel'
     * @property string style Whether to use the `@test` annotation or not;
     *                        default: 'prefix'
     */
    'php_unit_test_annotation' => [
        'case' => 'camel',
        'style' => 'annotation',
    ],

    /**
     * Calls to `PHPUnit\Framework\TestCase` static methods must all be of the same type, either `$this->`, `self::` or
     * `static::`.
     *
     * Risky when PHPUnit classes are overridden or not accessible, or when project has PHPUnit incompatibilities.
     *
     * @property string call_type The call type to use for referring to PHPUnit methods;
     *                            default: 'static'
     * @property array  methods   Dictionary of `method` => `call_type` values differ from the default strategy;
     *                            default: []
     */
    'php_unit_test_case_static_method_calls' => [
        'call_type' => 'this',
        'methods' => [],
    ],

    /**
     * Adds a default `@coversNothing` annotation to PHPUnit test classes that have no `@covers*` annotation.
     */
    'php_unit_test_class_requires_covers' => false,

    /**
     * PHPDoc should contain `@param` for all params.
     *
     * @property bool only_untyped Whether to add missing `@param` annotations for untyped parameters only;
     *                             default: true
     */
    'phpdoc_add_missing_param_annotation' => [
        'only_untyped' => false,
    ],

    /**
     * All items of the given phpdoc tags must be either left-aligned or (by
     * default) aligned vertically.
     *
     * @property string align Align comments;
     *                        default: 'vertical'
     * @property array  tags  The tags that should be aligned;
     *                        default: ['param', 'return', 'throws', 'type', 'var']
     */
    'phpdoc_align' => [
        'align' => 'vertical',
        'tags' => [
            'param',
            'return',
            'throws',
            'type',
            'var',
        ],
    ],

    /**
     * PHPDoc annotation descriptions should not be a sentence.
     */
    'phpdoc_annotation_without_dot' => false,

    /**
     * DocBlocks should have the same indentation as the documented subject.
     */
    'phpdoc_indent' => true,

    /**
     * Fix PHPDoc inline tags, make `@inheritdoc` always inline.
     */
    'phpdoc_inline_tag' => true,

    /**
     * `@access` annotations should be omitted from PHPDoc.
     */
    'phpdoc_no_access' => true,

    /**
     * No alias PHPDoc tags should be used.
     *
     * @property array replacements Mapping between replaced annotations with new ones;
     *                              default: ['property-read' => 'property', 'property-write' => 'property',
     *                              'type' => 'var', 'link' => 'see']
     */
    'phpdoc_no_alias_tag' => false,

    /**
     * `@return void` and `@return null` annotations should be omitted from PHPDoc.
     */
    'phpdoc_no_empty_return' => false,

    /**
     * `@package` and `@subpackage` annotations should be omitted from PHPDoc.
     */
    'phpdoc_no_package' => false,

    /**
     * Classy that does not inherit must not have `@inheritdoc` tags.
     */
    'phpdoc_no_useless_inheritdoc' => true,

    /**
     * Annotations in PHPDoc should be ordered so that `@param` annotations come first, then `@throws` annotations,
     * then `@return` annotations.
     */
    'phpdoc_order' => true,

    /**
     * The type of `@return` annotations of methods returning a reference to itself must the configured one.
     *
     * @property array replacements Mapping between replaced return types with new ones;
     *                              default: ['this' => '$this', '@this' => '$this', '$self' => 'self',
     *                              '@self' => 'self', '$static' => 'static', '@static' => 'static']
     */
    'phpdoc_return_self_reference' => [
        'replacements' => [
            'this' => 'self',
            '@this' => 'self',
            '$self' => 'self',
            '@self' => 'self',
            '$static' => 'self',
            '@static' => 'self',
        ],
    ],

    /**
     * Scalar types should always be written in the same form. `int` not `integer`, `bool` not `boolean`, `float` not
     * `real` or `double`.
     *
     * @property array types A map of types to fix;
     *                       default: ['boolean', 'double', 'integer', 'real', 'str']
     */
    'phpdoc_scalar' => [
        'types' => [
            'boolean',
            'double',
            'integer',
            'real',
            'str',
        ],
    ],

    /**
     * Annotations in PHPDoc should be grouped together so that annotations of the same type immediately follow each
     * other, and annotations of a different type are separated by a single blank line.
     */
    'phpdoc_separation' => true,

    /**
     * Single line `@var` PHPDoc should have proper spacing.
     */
    'phpdoc_single_line_var_spacing' => true,

    /**
     * PHPDoc summary should end in either a full stop, exclamation mark, or question mark.
     */
    'phpdoc_summary' => true,

    /**
     * DocBlocks should only be used on structural elements.
     */
    'phpdoc_to_comment' => true,

    /**
     * Takes `@return` annotation of non-mixed types and adjusts accordingly the function signature. Requires PHP >=
     * 7.0.
     *
     * Risky: [1] This rule is EXPERIMENTAL and is not covered with backward compatibility promise. [2] `@return`
     * annotation is mandatory for the fixer to make changes, signatures of methods without it (no docblock,
     * inheritdocs) will not be fixed. [3] Manual actions are required if inherited signatures are not properly
     * documented. [4] `@inheritdocs` support is under construction.
     */
    'phpdoc_to_return_type' => false,

    /**
     * PHPDoc should start and end with content, excluding the very first and last line of the docblocks.
     */
    'phpdoc_trim' => true,

    /**
     * Removes extra blank lines after summary and after description in PHPDoc.
     */
    'phpdoc_trim_consecutive_blank_line_separation' => true,

    /**
     * The correct case must be used for standard PHP types in PHPDoc.
     *
     * @property array groups Type groups to fix;
     *                        default: ['simple', 'alias', 'meta']
     */
    'phpdoc_types' => [
        'groups' => [
            'simple',
            'alias',
            'meta',
        ],
    ],

    /**
     * Sorts PHPDoc types.
     *
     * @property string null_adjustment Forces the position of `null` (overrides `sort_algorithm`);
     *                                  default: 'always_first'
     * @property string sort_algorithm  The sorting algorithm to apply;
     *                                  default: 'alpha'
     */
    'phpdoc_types_order' => [
        'null_adjustment' => 'always_last',
        'sort_algorithm' => 'none',
    ],

    /**
     * `@var` and `@type` annotations must have type and name in the correct order.
     */
    'phpdoc_var_annotation_correct_order' => true,

    /**
     * `@var` and `@type` annotations should not contain the variable name.
     */
    'phpdoc_var_without_name' => true,

    /**
     * Converts `pow` to the `**` operator.
     *
     * Risky when the function `pow` is overridden.
     */
    'pow_to_exponentiation' => false,

    /**
     * Pre incrementation/decrementation should be used if possible.
     *
     * @deprecated Use `increment_style`
     */
    'pre_increment' => false,

    /**
     * Converts `protected` variables and methods to `private` where possible.
     */
    'protected_to_private' => false,

    /**
     * Classes must be in a path that matches their namespace, be at least one namespace deep and the class name should
     * match the file name.
     *
     * Risky: This fixer may change your class name, which will break the code that depends on the old name.
     */
    'psr0' => false,

    /**
     * Class names should match the file name.
     *
     * Risky: This fixer may change your class name, which will break the code that depends on the old name.
     */
    'psr4' => true,

    /**
     * Replaces `rand`, `srand`, `getrandmax` functions calls with their `mt_*`
     * analogs.
     *
     * Risky when the configured functions are overridden.
     *
     * @property array replacements Mapping between replaced functions with the new ones;
     *                              default: ['getrandmax' => 'mt_getrandmax', 'rand' => 'mt_rand',
     *                              'srand' => 'mt_srand']
     */
    'random_api_migration' => [
        'replacements' => [
            'getrandmax' => 'mt_getrandmax',
            'rand' => 'mt_rand',
            'srand' => 'mt_srand',
        ],
    ],

    /**
     * Local, dynamic and directly referenced variables should not be assigned and directly returned by a function or
     * method.
     */
    'return_assignment' => true,

    /**
     * There should be one or no space before colon, and one space after it in return type declarations, according to
     * configuration.
     *
     * @property string space_before Spacing to apply before colon;
     *                               default: 'none'
     */
    'return_type_declaration' => [
        'space_before' => 'none',
    ],

    /**
     * Inside class or interface element `self` should be preferred to the class name itself.
     *
     * Risky when using calls like `get_called_class()` or late static binding.
     */
    'self_accessor' => true,

    /**
     * Instructions must be terminated with a semicolon.
     */
    'semicolon_after_instruction' => true,

    /**
     * Cast shall be used, not `settype`.
     *
     * Risky when the `settype` function is overridden or when used as the 2nd or 3rd expression in a `for` loop.
     */
    'set_type_to_cast' => true,

    /**
     * Cast `(boolean)` and `(integer)` should be written as `(bool)` and `(int)`, `(double)` and `(real)` as
     * `(float)`, `(binary)` as `(string)`.
     */
    'short_scalar_cast' => true,

    /**
     * Ensures deprecation notices are silenced.
     *
     * Risky: Silencing of deprecation errors might cause changes to code behavior.
     *
     * @deprecated Use `error_suppression`
     */
    'silenced_deprecation_error' => false,

    /**
     * Converts explicit variables in double-quoted strings and heredoc syntax from simple to complex format
     * (`${` to `{$`).
     */
    'simple_to_complex_string_variable' => true,

    /**
     * A return statement wishing to return `void` should not return `null`.
     */
    'simplified_null_return' => true,

    /**
     * A PHP file without end tag must always end with a single empty line feed.
     */
    'single_blank_line_at_eof' => true,

    /**
     * There should be exactly one blank line before a namespace declaration.
     */
    'single_blank_line_before_namespace' => true,

    /**
     * There MUST NOT be more than one property or constant declared per statement.
     *
     * @property array elements List of strings which element should be modified;
     *                          default: ['const', 'property']
     */
    'single_class_element_per_statement' => [
        'elements' => [
            'const',
            'property',
        ],
    ],

    /**
     * There MUST be one use keyword per declaration.
     */
    'single_import_per_statement' => true,

    /**
     * Each namespace use MUST go on its own line and there MUST be one blank line after the use statements block.
     */
    'single_line_after_imports' => true,

    /**
     * Single-line comments and multi-line comments with only one line of actual content should use the `//` syntax.
     *
     * @property array comment_types List of comment types to fix;
     *                               default: ['asterisk', 'hash']
     */
    'single_line_comment_style' => [
        'comment_types' => [
            'hash',
        ],
    ],

    /**
     * Convert double quotes to single quotes for simple strings.
     *
     * @property bool strings_containing_single_quote_chars Whether to fix double-quoted strings that contains single-
     *                                                      quotes;
     *                                                      default: false
     */
    'single_quote' => [
        'strings_containing_single_quote_chars' => false,
    ],

    /**
     * Each trait `use` must be done as single statement.
     */
    'single_trait_insert_per_statement' => false,

    /**
     * Fix whitespace after a semicolon.
     *
     * @property bool remove_in_empty_for_expressions Whether spaces should be removed for empty `for` expressions;
     *                                                default: false
     */
    'space_after_semicolon' => [
        'remove_in_empty_for_expressions' => false,
    ],

    /**
     * Increment and decrement operators should be used if possible.
     */
    'standardize_increment' => true,

    /**
     * Replace all `<>` with `!=`.
     */
    'standardize_not_equals' => true,

    /**
     * Lambdas not (indirect) referencing `$this` must be declared `static`.
     *
     * Risky when using `->bindTo` on lambdas without referencing to `$this`.
     */
    'static_lambda' => false,

    /**
     * Comparisons should be strict.
     *
     * Risky: changing comparisons to strict might change code behavior.
     */
    'strict_comparison' => true,

    /**
     * Functions should be used with `$strict` param set to `true`.
     *
     * Risky when the fixed function is overridden or if the code relies on non-strict usage.
     */
    'strict_param' => true,

    /**
     * All multi-line strings must use correct line ending.
     *
     * Risky: changing the line endings of multi-line strings might affect string comparisons and outputs.
     */
    'string_line_ending' => true,

    /**
     * A case should be followed by a colon and not a semicolon.
     */
    'switch_case_semicolon_to_colon' => true,

    /**
     * Removes extra spaces between colon and case value.
     */
    'switch_case_space' => true,

    /**
     * Standardize spaces around ternary operator.
     */
    'ternary_operator_spaces' => true,

    /**
     * Use `null` coalescing operator `??` where possible. Requires PHP >= 7.0.
     */
    'ternary_to_null_coalescing' => true,

    /**
     * PHP multi-line arrays should have a trailing comma.
     *
     * @property bool after_heredoc Whether a trailing comma should also be placed after heredoc end;
     *                              default: false
     */
    'trailing_comma_in_multiline_array' => [
        'after_heredoc' => false,
    ],

    /**
     * Arrays should be formatted like function/method arguments, without leading or trailing single line space.
     */
    'trim_array_spaces' => true,

    /**
     * Unary operators should be placed adjacent to their operands.
     */
    'unary_operator_spaces' => true,

    /**
     * Visibility MUST be declared on all properties and methods; `abstract` and `final` MUST be declared before the
     * visibility; `static` MUST be declared after the visibility.
     *
     * @property array elements The structural elements to fix (PHP >= 7.1 required for `const`;
     *                          default: ['property', 'method']
     */
    'visibility_required' => [
        'elements' => [
            'const',
            'method',
            'property',
        ],
    ],

    /**
     * Add void return type to functions with missing or empty return statements, but priority is given to `@return`
     * annotations. Requires PHP >= 7.1.
     *
     * Risky: modifies the signature of functions.
     */
    'void_return' => true,

    /**
     * In array declaration, there MUST be a whitespace after each comma.
     */
    'whitespace_after_comma_in_array' => true,

    /**
     * Write conditions in Yoda style (`true`), non-Yoda style (`false`) or ignore those conditions (`null`) based on
     * configuration.
     *
     * @property bool      always_move_variable Whether variables should always be on non-assignable side when applying
     *                                          Yoda style;
     *                                          default: false
     * @property bool|null equal                Style for equal `==`, `!=`) statements;
     *                                          default: true
     * @property bool|null identical            Style for identical (`===`, `!==`) statements;
     *                                          default: true
     * @property bool|null less_and_greater     Style for less and greater than (`<`, `<=`, `>`, `>=`) statements;
     *                                          default: null
     */
    'yoda_style' => false,
];

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude([
        'bootstrap',
        'config',
        'public',
        'storage',
    ])
    ->notPath([
        'server.php',
    ])
    ->ignoreVCSIgnored(true);

return PhpCsFixer\Config::create()
    ->setRiskyAllowed(true)
    ->setRules($rules)
    ->setfinder($finder);
