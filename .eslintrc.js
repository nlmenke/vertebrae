/**
 * Config file for ESLint.
 *
 * @package Config - ESLint
 *
 * @author    Nick Menke <nick@nlmenke.net>
 * @copyright 2018-2020 Nick Menke
 *
 * @link  https://github.com/nlmenke/vertebrae
 * @since x.x.x introduced
 */

/**
 * These rules relate to possible syntax or logic errors in JavaScript code.
 *
 * @type {object}
 */
let ESLintPossibleErrors = {
    /**
     * A `for` loop with a stop condition that can never be reached, such as one with a counter that moves in the wrong
     * direction, will run infinitely. While there are occasions when an infinite loop is intended, the convention is
     * to construct such loops as `while` loops. More typically, an infinite for loop is a bug.
     */
    'for-direction': 'error',

    /**
     * This rule enforces that a return statement is present in property getters.
     *
     * @property {object} options
     *                            - `allowImplicit` {bool} Disallows implicitly returning `undefined` with a `return`
     *                                                     statement;
     *                                                     default: false
     */
    'getter-return': [
        'error',
        {
            'allowImplicit': false,
        },
    ],

    /**
     * This rule aims to disallow async Promise executor functions.
     */
    'no-async-promise-executor': 'error',

    /**
     * This rule disallows the use of `await` within loop bodies.
     */
    'no-await-in-loop': 'off',

    /**
     * The rule should warn against code that tries to compare against -0, since that will not work as intended. That
     * is, code like `x === -0` will pass for both +0 and -0. The author probably intended `Object.is(x, -0)`.
     */
    'no-compare-neg-zero': 'error',

    /**
     * This rule disallows ambiguous assignment operators in test conditions of `if`, `for`, `while`, and `do...while`
     * statements.
     *
     * @property {string} options
     *                            - `except-parens` Allows assignments in test conditions only if they are enclosed in
     *                                              parentheses (for example, to allow reassigning a variable in the
     *                                              test of a `while` or `do...while` loop)
     *                            - `always`        Disallows all assignments in test conditions
     *                            default: `except-parens`
     */
    'no-cond-assign': [
        'error',
        'except-parens',
    ],

    /**
     * This rule disallows calls to methods of the `console` object.
     *
     * @property {object} exceptions
     *                               - `allow` {array} An array of strings which area allowed methods of the console
     *                                                 object
     */
    'no-console': 'off',

    /**
     * This rule disallows constant expressions in the test condition of:
     *   - `if`, `for`, `while`, or `do...while` statement
     *   - `?:` ternary expression
     *
     * @property {object} options
     *                            - `checkLoops` {bool} Setting this option to `false` allows constant expression in
     *                                                  loops;
     *                                                  default: true
     */
    'no-constant-condition': [
        'error',
        {
            'checkLoops': false,
        },
    ],

    /**
     * This rule disallows control characters in regular expressions.
     */
    'no-control-regex': 'error',

    /**
     * This rule disallows `debugger` statements.
     */
    'no-debugger': 'error',

    /**
     * This rule disallows duplicate parameter names in function declarations or expressions. It does not apply to
     * arrow functions or class methods, because the parser reports the error.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-dupe-args': 'error',

    /**
     * This rule disallows duplicate conditions in the same `if-else-if` chain.
     */
    'no-dupe-else-if': 'off',

    /**
     * This rule disallows duplicate keys in object literals.
     */
    'no-dupe-keys': 'error',

    /**
     * This rule disallows duplicate test expressions in `case` clauses of `switch` statements.
     */
    'no-duplicate-case': 'error',

    /**
     * This rule disallows empty block statements. This rule ignores block statements which contain a comment (for
     * example, in an empty `catch` or `finally` block of a `try` statement to indicate that execution should continue
     * regardless of errors).
     *
     * @property {object} exceptions
     *                               - `allowEmptyCatch` {bool} Allows empty `catch` clauses (that is, which do not
     *                                                          contain a comment);
     *                                                          default: false
     */
    'no-empty': [
        'error',
        {
            'allowEmptyCatch': false,
        },
    ],

    /**
     * This rule disallows empty character classes in regular expressions.
     */
    'no-empty-character-class': 'error',

    /**
     * This rule disallows reassigning exceptions in `catch` clauses.
     */
    'no-ex-assign': 'error',

    /**
     * This rule disallows unnecessary boolean casts.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-boolean-cast': 'error',

    /**
     * This rule always ignores extra parentheses around the following:
     *   - RegExp literals such as `(/abc/).test(var)` to avoid conflicts with the wrap-regex rule
     *   - immediately-invoked function expressions (also known as IIFEs) such as `var x = (function () {})();` and
     *     `((function foo() {return 1;})())` to avoid conflicts with the wrap-iife rule
     *   - arrow function arguments to avoid conflicts with the arrow-parens rule
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                                  - `all`      Disallows unnecessary parentheses around any expression
     *                                  - `functions Disallows unnecessary parentheses only around function expressions
     *                                  default: `all`
     * @property {object} allExceptions This rule has an object option for exceptions to the `all` option
     *                                  - `"conditionalAssign": false`                    Allows extra parentheses
     *                                                                                    around assignments in
     *                                                                                    conditional test expressions
     *                                  - `"returnAssign": false`                         Allows extra parentheses
     *                                                                                    around assignments in
     *                                                                                    `return` statements
     *                                  - `"nestedBinaryExpressions": false`              Allows extra parentheses in
     *                                                                                    nested binary expressions
     *                                  - `"ignoreJSX": "none|all|multi-line|single-line" Allows extra parentheses
     *                                                                                    around no/all/multi-line/
     *                                                                                    single-line JSX components;
     *                                                                                    default: `none`
     *                                  - `"enforceForArrowConditionals": false`          Allows extra parentheses
     *                                                                                    around ternary expressions
     *                                                                                    which are the body of an
     *                                                                                    arrow function
     *                                  - `"enforceForSequenceExpressions": false`        Allows extra parentheses
     *                                                                                    around sequence expressions
     *                                  - `"enforceForNewInMemberExpressions": false`     Allows extra parentheses
     *                                                                                    around `new` expressions in
     *                                                                                    member expressions
     */
    'no-extra-parens': [
        'error',
        'functions',
    ],

    /**
     * This rule disallows unnecessary semicolons.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-semi': 'off',

    /**
     * This rule disallows reassigning `function` declarations.
     */
    'no-func-assign': 'error',

    /**
     * This rule warns the assignments, increments, and decrements of imported bindings.
     */
    'no-import-assign': 'off',

    /**
     * This rule requires that function declarations and, optionally, variable declarations be in the root of a program
     * or the body of a function.
     *
     * @property {string} options
     *                            - `functions` Disallows `function` declarations in nested blocks
     *                            - `both`      Disallows `function` and `var` declarations in nested blocks
     *                            default: `functions`
     */
    'no-inner-declarations': [
        'error',
        'functions',
    ],

    /**
     * This rule disallows invalid regular expression strings in `RegExp` constructors.
     *
     * @property {object} exceptions
     *                               - `allowConstructorFlags` {array} Array of flags
     */
    'no-invalid-regexp': 'error',

    /**
     * This rule is aimed at catching invalid whitespace that is not a normal tab and space. Some of these characters
     * may cause issues in modern browsers and others will be a debugging issue to spot.
     *
     * @property {object} exceptions
     *                               - `skipStrings`   {bool} Allows any whitespace characters in string literals;
     *                                                        default: true
     *                               - `skipComments`  {bool} Allows any whitespace characters in comments;
     *                                                        default: false
     *                               - `skipRegExps`   {bool} Allows any whitespace characters in regular expression
     *                                                        literals;
     *                                                        default: false
     *                               - `skipTemplates` {bool} Allows any whitespace characters in template literals;
     *                                                        default: false
     *                               default: `"skipStrings": true`
     */
    'no-irregular-whitespace': [
        'error',
        {
            "skipStrings": true,
        },
    ],

    /**
     * This rule reports the regular expressions which include multiple code point characters in character class
     * syntax.
     */
    'no-misleading-character-class': 'error',

    /**
     * This rule disallows calling the `Math`, `JSON`, `Reflect` and `Atomics` objects as functions.
     */
    'no-obj-calls': 'error',

    /**
     * This rule disallows calling some `Object.prototype` methods directly on object instances.
     */
    'no-prototype-builtins': 'error',

    /**
     * This rule disallows multiple spaces in regular expression literals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-regex-spaces': 'error',

    /**
     * This rule disallows returning values from setters and reports `return` statements in setter functions.
     *
     * Only `return` without a value is allowed, as it's a control flow statement.
     *
     * This rule checks setters in:
     *   - object literals
     *   - class declarations and class expressions
     *   - property descriptors in `Object.create`, `Object.defineProperty`, `Object.defineProperties`, and
     *     `Reflect.defineProperty` methods of the global objects
     */
    'no-setter-return': 'off',

    /**
     * This rule disallows sparse array literals which have "holes" where commas are not preceded by elements. It does
     * not apply to a trailing comma following the last element.
     */
    'no-sparse-arrays': 'error',

    /**
     * This rule aims to warn when a regular string contains what looks like a template literal placeholder. It will
     * warn when it finds a string containing the template literal placeholder (`${something}`) that uses either `"` or
     * `'` for the quotes.
     */
    'no-template-curly-in-string': 'error',

    /**
     * This rule disallows confusing multiline expressions where a newline looks like it is ending a statement, but is
     * not.
     */
    'no-unexpected-multiline': 'error',

    /**
     * This rule disallows unreachable code after `return`, `throw`, `continue`, and `break` statements.
     */
    'no-unreachable': 'error',

    /**
     * This rule disallows `return`, `throw`, `break`, and `continue` statements inside finally blocks. It allows
     * indirect usages, such as in `function` or `class` definitions.
     */
    'no-unsafe-finally': 'error',

    /**
     * This rule disallows negating the left operand of the following relational operators:
     *   - `in` operator
     *   - `instanceof` operator
     *
     * @property {object} options
     *                            - `enforceForOrderingRelations` {bool} Disallows negation of the left-hand side of
     *                                                                   ordering relational operators (`<`, `>`, `<=`,
     *                                                                   `>=`);
     *                                                                   default: false
     */
    'no-unsafe-negation': [
        'error',
        {
            'enforceForOrderingRelations': false,
        }
    ],

    /**
     * This rule aims to report assignments to variables or properties where all of the following are true:
     *   - a variable or property is reassigned to a new value which is based on its old value
     *   - a `yield` or `await` expression interrupts the assignment after the old value is read, and before the new
     *     value is set
     *   - the rule cannot easily verify that the assignment is safe (e.g.: if an assigned variable is local and would
     *     not be readable from anywhere else while the function is paused)
     */
    'require-atomic-updates': 'off',

    /**
     * This rule disallows comparisons to 'NaN'.
     *
     * @property {object} options
     *                            - `enforceForSwitchCase` {bool} Disallows `case NaN` and `switch(NaN` statements;
     *                                                            default: false
     *                            - `enforceForIndexOf`    {bool} Disallows the use of `indexOf` and `lastIndexOf`
     *                                                            methods with `NaN`;
     *                                                            default: false
     */
    'use-isnan': [
        'error',
        {
            'enforceForSwitchCase': false,
            'enforceForIndexOf': false,
        },
    ],

    /**
     * This rule enforces comparing `typeof` expressions to valid string literals.
     *
     * @property {object} options
     *                            - `requireStringLiterals` {bool} Requires `typeof` expressions to only be compared to
     *                                                             string literals or other `typeof` expressions, and
     *                                                             disallows comparisons to any other value;
     *                                                             default: false
     */
    'valid-typeof': [
        'error',
        {
            'requireStringLiterals': true,
        },
    ],
};

/**
 * these rules relate to better ways of doing things to help you avoid problems.
 *
 * @type {object}
 */
let ESLintBestPractices = {
    /**
     * This rule enforces a style where it requires to have a getter for every property which has a setter defined.
     *
     * By activating the option `getWithoutSet` it enforces the presence of a setter for every property which has a
     * getter defined.
     *
     * By default, this rule checks only object literals and property descriptors. If you want this rule to also check
     * class declarations and class expressions, activate the option `enforceForClassMembers`.
     *
     * @property {object} options
     *                            - `setWithoutGet`          {bool} Warn for setters without getters;
     *                                                              default: true
     *                            - `getWithoutSet`          {bool} Warn for getters without setters;
     *                                                              default: false
     *                            - `enforceForClassMembers` {bool} Additionally applies this rule to class getters/
     *                                                              setters;
     *                                                              default: false
     */
    'accessor-pairs': 'off',

    /**
     * This rule finds callback functions of the following methods, then checks usage of `return` statement.
     *   - `Array.from`
     *   - `Array.prototype.every`
     *   - `Array.prototype.filter`
     *   - `Array.prototype.find`
     *   - `Array.prototype.findIndex`
     *   - `Array.prototype.map`
     *   - `Array.prototype.reduce`
     *   - `Array.prototype.reduceRight`
     *   - `Array.prototype.some`
     *   - `Array.prototype.sort`
     *   - and above of typed arrays
     *
     * @property {object} options
     *                            - `allowImplicit` {bool} Allows implicitly returning `undefined` with a `return`
     *                                                     statement containing no expression;
     *                                                     default: false
     */
    'array-callback-return': 'off',

    /**
     * This rule aims to reduce the usage of variables outside of their binding context and emulate traditional block
     * scope from other languages. This is to help newcomers to the language avoid difficult bugs with variable
     * hoisting.
     */
    'block-scoped-var': 'off',

    /**
     * This rule is aimed to flag class methods that do not use `this`.
     *
     * @property {object} exceptions
     *                               - `exceptMethods` {array} Array of method names for which warnings are ignored
     */
    'class-methods-use-this': 'off',

    /**
     * This rule is aimed at reducing code complexity by capping the amount of cyclomatic complexity allowed in a
     * program. As such, it will warn when the cyclomatic complexity crosses the configured threshold.
     *
     * @property {object|int} options Object or maximum complexity integer
     *                                - `max` {int} Maximum complexity;
     *                                              default: 20
     */
    'complexity': 'off',

    /**
     * This rule requires `return` statements to either always or never specify values. This rule ignores function
     * definitions where the name begins with an uppercase letter, because constructors (when invoked with the new
     * operator) return the instantiated object implicitly if they do not return another object explicitly.
     *
     * @property {object} options
     *                            - `treatUndefinedAsUnspecified` {bool} Always either specify values or return
     *                                                                   `undefined` explicitly or implicitly;
     *                                                                   default: false
     */
    'consistent-return': 'off',

    /**
     * This rule is aimed at preventing bugs and increasing code clarity by ensuring that block statements are wrapped
     * in curly braces. It will warn when it encounters blocks that omit curly braces.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                            - `all`           All of the below options
     *                            - `multi`         Warns whenever `if`, `else`, `for`, `while`, or `do` are used
     *                                              without block statements as their body. However, you can specify
     *                                              that block statements should be used only when there are multiple
     *                                              statements in the block and warn when there is only one statement
     *                                              in the block
     *                            - `multi-line     Alternatively, you can relax the rule to allow brace-less single-
     *                                              line `if`, `else if`, `else`, `for`, `while`, or `do`, while still
     *                                              enforcing the use of curly braces for other instances
     *                            - `multi-or-nest` You can use another configuration that forces brace-less `if`,
     *                                              `else if`, `else`, `for`, `while`, or `do` if their body contains
     *                                              only one single-line statement and forces braces in all other cases
     *                            - `consistent`    When using any of the `multi*` options, you can add an option to
     *                                              enforce all bodies of a `if`, `else if`, and `else` chain to be
     *                                              with or without braces
     */
    'curly': [
        'error',
        'all',
    ],

    /**
     * This rule aims to require `default` case in `switch` statements. You may optionally include a `// no default`
     * after the last `case` if there is no `default` case. The comment may be in any desired case, such as `// No
     * Default`.
     *
     * @property {object} options
     *                            - `commentPattern` {string} Set the `commentPattern` option to a regular expression
     *                                                        string to change the default comment test pattern;
     *                                                        default: `/^no default$/i`
     */
    'default-case': [
        'error',
        {
            'commentPattern': '/^no default$/',
        },
    ],

    /**
     * This rule enforces default parameters to be the last of parameters.
     */
    'default-param-last': 'off',

    /**
     * This rule aims to enforce newline consistency in member expressions. This rule prevents the use of mixed
     * newlines around the dot in a member expression.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} dotLocation Where to require the dot in a member expression
     *                                - `object`
     *                                - `property`
     *                                default: `object`
     */
    'dot-location': [
        'error',
        'property',
    ],

    /**
     * This rule is aimed at maintaining code consistency and improving code readability by encouraging use of the dot
     * notation style whenever possible. As such, it will warn when it encounters an unnecessary use of square-bracket
     * notation.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `allowKeywords` {bool}   Set this option to false to follow EXMAScript version 3
     *                                                       compatible style, avoiding dot notation for reserved word
     *                                                       properties;
     *                                                       default: true
     *                            - `allowPattern`  {string} Set this option to a regular expression string to allow
     *                                                       bracket notation for property names that match a pattern;
     *                                                       default: (no pattern)
     */
    'dot-notation': [
        'error',
        {
            'allowKeywords': true,
        },
    ],

    /**
     * This rule is aimed at eliminating the type-unsafe equality operators.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                              - `always` Enforces the use of `===` and `!==` in every situation (except when you
     *                                         opt-in  to more specific handling of `null` (see below))
     *                              - `smart`  Enforces the use of `===` and `!==` except for these cases:
     *                                         - comparing two literal values
     *                                         - evaluating the value of `typeof`
     *                                         - comparing against `null`
     *                              default: `always`
     * @property {object} supported This rule optionally takes a second argument, which should be an object with the
     *                              following supported properties:
     *                              - `null` Customize how this rule treats `null` literals
     *                                       - `always` Always use `===` or `!==`
     *                                       - `never`  Never use `===` or `!--` with null
     *                                       - `ignore` Do not apply this rule to `null
     *                                       default: `always`
     */
    'eqeqeq': [
        'error',
        'always',
        {
            'null': 'ignore',
        },
    ],

    /**
     * This rule requires grouped definitions of accessor functions for the same property in object literals, class
     * declarations and class expressions.
     *
     * Optionally, this rule can also enforce consistent order (getBeforeSet or setBeforeGet).
     *
     * This rule does not enforce the existence of the pair for a getter or a setter. See accessor-pairs if you also
     * want to enforce getter/setter pairs.
     *
     * @property {string} order
     *                          - `anyOrder`     Does not enforce order
     *                          - `getBeforeSet` If a property has both a getter and setter, requires the getter to be
     *                                           defined before the setter
     *                          - `setBeforeGet` If a property has both a getter and setter, requires the setter to be
     *                                           defined before the getter
     *                          default: `anyOrder`
     */
    'grouped-accessor-pairs': 'off',

    /**
     * This rule is aimed at preventing unexpected behavior that could arise from using a `for in` loop without
     * filtering the results in the loop. As such, it will warn when `for in` loops do not filter their results with an
     * `if` statement.
     */
    'guard-for-in': 'off',

    /**
     * This rule enforces that each file may contain only a particular number of classes and no more.
     *
     * @property {int} maxClasses Maximum number of classes allowed in the file;
     *                            default: 1
     */
    'max-classes-per-file': 'off',

    /**
     * This rule is aimed at catching debugging code that should be removed and popup UI elements that should be
     * replaced with less obtrusive, custom UIs. As such, it will warn when it encounters `alert`, `prompt`, and
     * `confirm` function calls which are not shadowed.
     */
    'no-alert': 'off',

    /**
     * This rule is aimed at discouraging the use of deprecated and sub-optimal code by disallowing the use of
     * `arguments.caller` and `arguments.callee`. As such, it will warn when `arguments.caller` and `arguments.callee`
     * are used.
     */
    'no-caller': 'error',

    /**
     * This rule aims to prevent access to uninitialized lexical bindings as well as accessing hoisted functions across
     * case clauses.
     */
    'no-case-declarations': 'error',

    /**
     * This rule disallows return statements in the constructor of a class. Note that returning nothing with flow
     * control is allowed.
     */
    'no-constructor-return': 'off',

    /**
     * This is used to disambiguate the division operator to not confuse users.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-div-regex': 'off',

    /**
     * This rule is aimed at highlighting an unnecessary block of code following an `if` containing a return statement.
     * As such, it will warn when it encounters an `else` following a chain of `if`s, all of them containing a `return`
     * statement.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} exceptions
     *                               - `allowElseIf` {bool} Allows `else if` blocks after a return;
     *                                                      default: true
     */
    'no-else-return': 'off',

    /**
     * This rule is aimed at eliminating empty functions. A function will not be considered a problem if it contains a
     * comment.
     *
     * @property {object} exceptions This rule has an option to allow specific kinds of functions to be empty
     *                               - `allow` {array} A list of allowed function types
     *                                                 - `functions`          Normal functions
     *                                                 - `arrowFunctions`     Arrow functions
     *                                                 - `generatorFunctions` Generator functions
     *                                                 - `methods`            Class methods and method shorthands of
     *                                                                        object literals
     *                                                 - `generatorMethods`   Class methods and method shorthands of
     *                                                                        object literals with generator
     *                                                 - `getters`            Getters
     *                                                 - `setters`            Setters
     *                                                 - `constructors`       Class constructors
     *                                                 default: []
     */
    'no-empty-function': 'off',

    /**
     * This rule aims to flag any empty patterns in destructured objects and arrays, and as such, will report a problem
     * whenever one is encountered.
     */
    'no-empty-pattern': 'error',

    /**
     * This rule aims to reduce potential bugs and unwanted behavior by ensuring that comparisons to `null` only match
     * `null`, and not also `undefined`. As such it will flag comparisons to `null` when using `==` and `!=`.
     */
    'no-eq-null': 'error',

    /**
     * This rule is aimed at preventing potentially dangerous, unnecessary, and slow code by disallowing the use of the
     * `eval()` function. As such, it will warn whenever the `eval()` function is used.
     */
    'no-eval': 'error',

    /**
     * Disallows directly modifying the prototype of builtin objects.
     *
     * @property {object} options
     *                            - `exceptions` {array} List of builtins for which extensions will be allowed
     */
    'no-extend-native': 'error',

    /**
     * This rule is aimed at avoiding the unnecessary use of `bind()` and as such will warn whenever an immediately-
     * invoked function expression (IIFE) is using `bind()` and doesn't have an appropriate `this` value. This rule
     * won't flag usage of `bind()` that includes function argument binding.
     *
     * Note: Arrow functions can never have their `this` value set using `bind()`. This rule flags all uses of `bind()`
     * with arrow functions as a problem.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-bind': 'error',

    /**
     * This rule is aimed at eliminating unnecessary labels.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-extra-label': 'off',

    /**
     * This rule is aimed at eliminating unintentional fallthrough of one case to the other. As such, it flags any
     * fallthrough scenarios that are not marked by a comment.
     *
     * @property {object} options
     *                            - `commentPattern` {string} Regular expression string to change the test for
     *                                                        intentional fallthrough comment
     */
    'no-fallthrough': 'error',

    /**
     * This rule is aimed at eliminating floating decimal points and will warn whenever a numeric value has a decimal
     * point but is missing a number either before or after it.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-floating-decimal': 'error',

    /**
     * This rule disallows modifications to read-only global variables.
     *
     * ESLint has the capability to configure global variables as read-only.
     *
     * @property {object} options
     *                            - `exceptions` {array} List of builtins for which reassignments will be allowed
     */
    'no-global-assign': 'error',

    /**
     * This rule is aimed to flag shorter notations for the type conversion, then suggest a more self-explanatory
     * notation.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `boolean`       Warns shorter type conversions for `boolean` type;
     *                                              default: true
     *                            - `number`        Warns shorter type conversions for `number` type;
     *                                              default: true
     *                            - `string`        Warns shorter type conversions for `string` type;
     *                                              default: true
     *                            - `allow` {array} Each entry in this array can be one of `~`, `!!`, `+`, or `*` that
     *                                              are to be allowed;
     *                                              default: []
     *                                              Note: operator `+` in list would allow `+foo` (number coercion) as
     *                                              well as `'' + foo` (string coercion)
     */
    'no-implicit-coercion': 'off',

    /**
     * When working with browser scripts, developers often forget that variable and function declarations at the top-
     * level scope become global variables on the `window` object. As opposed to modules which have their own scope.
     * Globals should be explicitly assigned to `window` or `self` if that is the intent. Otherwise variables intended
     * to be local to the script should be wrapped in an IIFE.
     *
     * This rule disallows `var` and `function` declarations at the top-level script scope. This does not apply to ES
     * and CommonJS modules since they have a module scope.
     *
     * When the code is not in `strict` mode, an assignment to an undeclared variable creates a new global variable.
     * This will happen even is the code is in a function.
     *
     * This does not apply to ES modules since the module code is implicitly in `strict` mode.
     *
     * This rule also disallows re-declarations of read-only global variables and assignments to read-only global
     * variables.
     *
     * A read-only global variable can be a built-in ES global (e.g. `Array`), an environment specific global (e.g.
     * `window` in the browser environment), or a global variable defined as `readonly` in the configuration file or in
     * a global comment.
     *
     * Lexical declarations `const` and `let`, as well as `class` declarations, create variables that are block-scoped.
     *
     * However, when declared in the top-level of a browser script these variables are not 'script-scoped'. They are
     * actually created in the global scope and could produce name collisions with `var`, `const` and `let` variables
     * and `function` and `class` declarations from other scripts. This does not apply to ES and CommonJS modules.
     *
     * If the variable is intended to be local to the script, wrap the code with a block or with an immediately-invoked
     * function expression (IIFE).
     *
     * If you intend to create a global `const` or `let` variable or a global `class` declaration, to be used from
     * other scripts, be aware that there are certain differences when compared to the traditional methods, which are
     * `var` declarations and assigning to a property of the global `window` object:
     *   - lexically declared variables cannot be conditionally created. A script cannot check for the existence of a
     *     variable and then create a new one. `var` variables are also always created, but re-declarations do not
     *     cause runtime exceptions
     *   - lexically declared variables do not create properties on the global object, which is what a consuming script
     *     might expect
     *   - lexically declared variables are shadowing properties of the global object, which might produce errors if a
     *     consuming script is using both the variable and the property
     *   - lexically declared variables can produce a permanent Temporal Dead Zone (TDZ) if the initialization throws
     *     an exception. Even the `typeof` check is not safe from TDZ reference exceptions
     */
    'no-implicit-globals': 'off',

    /**
     * This rule aims to eliminate implied `eval()` through the use of `setTimeout()`, `setInterval()`, or
     * `execScript()`. As such, it will warn when either function is used with a string as the first argument.
     */
    'no-implied-eval': 'error',

    /**
     * This rule aims to flag usage of `this` keywords outside of classes or class-like objects.
     *
     * Basically, this rule checks whether or not a function containing `this` keyword is a constructor or a method.
     *
     * This rule judges from following conditions whether or not the function is a constructor:
     *   - the name of the function starts with uppercase
     *   - the function is assigned to a variable which starts with an uppercase letter
     *   - the function is a constructor of ES2015 Classes
     *
     * This rule judges from following conditions whether or not the function is a method:
     *   - the function is on an object literal
     *   - the function is assigned to a property
     *   - the function is a method/getter/setter of ES2015 Classes (excepts static methods)
     *
     * And this rule allows this keywords in functions below:
     *   - the `call/apply/bind` method of the function is called directly
     *   - the function is a callback of array methods (such as `.forEach()`) if `thisArg` is given
     *   - the function has `@this` tag in its JSDoc comment
     *   - otherwise are considered problems
     *
     * This rule applies only in strict mode. With `"parserOptions": { "sourceType": "module" }` in the ESLint
     * configuration, your code is in strict mode even without a `"use strict"` directive.
     *
     * @property {object} options
     *                            - `capIsConstructor` {bool} Assume a function which name starts with an uppercase is
     *                                                        a constructor;
     *                                                        default: true
     */
    'no-invalid-this': 'off',

    /**
     * This rule is aimed at preventing errors that may arise from using the `__iterator__` property, which is not
     * implemented in several browsers. As such, it will warn whenever it encounters the `__iterator__` property.
     */
    'no-iterator': 'error',

    /**
     * This rule aims to eliminate the use of labeled statements in JavaScript. It will warn whenever a labeled
     * statement is encountered and whenever `break` or `continue` are used with a label.
     *
     * @property {object} options
     *                            - `allowLoop`   {bool} Ignore labels which are sticking to loop statements;
     *                                                   default: false
     *                            - `allowSwitch` {bool} Ignore labels which are sticking to switch statements;
     *                                                   default: false
     */
    'no-labels': [
        'error',
        {
            'allowLoop': false,
            'allowSwitch': false,
        },
    ],

    /**
     * This rule aims to eliminate unnecessary and potentially confusing blocks at the top level of a script or within
     * other blocks.
     */
    'no-lone-blocks': 'error',

    /**
     * This error is raised to highlight a piece of code that may not work as you expect it to and could also indicate
     * a misunderstanding of how the language works. Your code may run without any problems if you do not fix this
     * error, but in some situations it could behave unexpectedly.
     *
     * This rule disallows any function within a loop that contains unsafe references (e.g. to modified variables from
     * the outer scope).
     */
    'no-loop-func': 'off',

    /**
     * This rule aims to make code more readable and refactoring easier by ensuring that special numbers are declared
     * as constants to make their meaning explicit.
     *
     * @property {object} options
     *                            - `ignore`             {array} An array of numbers to ignore;
     *                                                           default: []
     *                            - `ignoreArrayIndexes` {bool}  Specifies if numbers used as array indexes are
     *                                                           considered okay;
     *                                                           default: false
     *                            - `enforceConst`       {bool}  Specifies if we should check for the const keyword in
     *                                                           variable declaration of numbers;
     *                                                           default: false
     *                            - detectObjects`       {bool}  Specifies if we should detect numbers when setting
     *                                                           object properties for example;
     *                                                           default: false
     */
    'no-magic-numbers': 'off',

    /**
     * This rule aims to disallow multiple whitespace around logical expressions, conditional expressions,
     * declarations, array elements, object properties, sequences and function parameters.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreEOLComments` {bool}   Ignore multiple spaces before comments that occur at
     *                                                           the end of lines;
     *                                                           default: false
     *                            - `exceptions`        {object} specifies nodes to ignore;
     *                                                           default: `{ "Property": true }
     */
    'no-multi-spaces': [
        'error',
        {
            'ignoreEOLComments': false,
            'exceptions': {
                'Property': true,
            },
        },
    ],

    /**
     * This rule is aimed at preventing the use of multiline strings.
     */
    'no-multi-str': 'error',

    /**
     * This rule is aimed at maintaining consistency and convention by disallowing constructor calls using the new
     * keyword that do not assign the resulting object to a variable.
     */
    'no-new': 'error',

    /**
     * This error is raised to highlight the use of a bad practice. By passing a string to the Function constructor,
     * you are requiring the engine to parse that string much in the way it has to when you call the `eval` function.
     */
    'no-new-func': 'error',

    /**
     * This rule aims to eliminate the use of `String`, `Number`, and `Boolean` with the `new` operator. As such, it
     * warns whenever it sees `new String`, `new Number`, or `new Boolean`.
     */
    'no-new-wrappers': 'error',

    /**
     * The rule disallows octal literals.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-octal': 'error',

    /**
     * This rule disallows octal escape sequences in string literals.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-octal-escape': 'error',

    /**
     * This rule aims to prevent unintended behavior caused by modification or reassignment of function parameters.
     *
     * @property {object} options
     *                            - `props`                               {bool}  Warn against the modification of
     *                                                                            parameter properties;
     *                                                                            default: false
     *                            - `ignorePropertyModificationsFor`      {array} Allow modification of properties for
     *                                                                            specific parameters;
     *                                                                            default: []
     *                            - `ignorePropertyModificationsForRegex` {array} Allow modification of properties for
     *                                                                            parameters that match a regular
     *                                                                            expression string;
     *                                                                            default: []
     */
    'no-param-reassign': 'off',

    /**
     * When an object is created with the `new` operator, `__proto__` is set to the original "prototype" property of
     * the object's constructor function. `Object.getPrototypeOf` is the preferred method of getting the object's
     * prototype. To change an object's prototype, use `Object.setPrototypeOf`.
     */
    'no-proto': 'error',

    /**
     * This rule is aimed at eliminating variables that have multiple declarations in the same scope.
     *
     * @property {object} options
     *                            - `builtinGlobals` {bool} Check for redeclaration of built-in globals in global
     *                                                      scope;
     *                                                      default: true
     */
    'no-redeclare': [
        'error',
        {
            'builtinGlobals': false,
        },
    ],

    /**
     * This rule looks for accessing a given property key on a given object name, either when reading the property's
     * value or invoking it as a function. You may specify an optional message to indicate an alternative API or a
     * reason for the restriction.
     *
     * @property {object} options This rule takes a list of objects, where the object name and property names are
     *                            specified
     */
    'no-restricted-properties': 'off',

    /**
     * This rule aims to eliminate assignments from `return` statements. As such, it will warn whenever an assignment
     * is found as part of `return`.
     *
     * @property {string} options
     *                            - `except-parens` Disallow assignments unless they are enclosed in parentheses
     *                            - `always`        Disallow all assignments in return statements
     *                            default: `except-parens`
     */
    'no-return-assign': [
        'error',
        'except-parens',
    ],

    /**
     * This rule aims to prevent a likely common performance hazard due to a lack of understanding of the semantics of
     * `async function`.
     */
    'no-return-await': 'error',

    /**
     * This rule disallows the use of `javascript:` URLs.
     */
    'no-script-url': 'off',

    /**
     * This rule is aimed at eliminating self assignments.
     *
     * @property {object} options
     *                            - `props` {bool} Warns self-assignments of properties;
     *                                             default: true
     */
    'no-self-assign': [
        'error',
        {
            'props': true,
        },
    ],

    /**
     * This error is raised to highlight a potentially confusing and potentially pointless piece of code. There are
     * almost no situations in which you would need to compare something to itself.
     */
    'no-self-compare': 'error',

    /**
     * This rule forbids the use of the comma operator, with the following exceptions:
     *
     *   - in the initialization or update portions of a for statement
     *   - if the expression sequence is explicitly wrapped in parentheses
     */
    'no-sequences': 'error',

    /**
     * This rule is aimed at maintaining consistency when throwing exception by disallowing to throw literals and other
     * expressions which cannot possibly be an `Error` object.
     */
    'no-throw-literal': 'error',

    /**
     * This rule finds references which are inside of loop conditions, then checks the variables of those references
     * are modified in the loop.
     *
     * If a reference is inside of a binary expression or a ternary expression, this rule checks the result of the
     * expression instead. If a reference is inside of a dynamic expression (e.g.: `CallExpression`, `YieldExpression`,
     * ...), this rule ignores it.
     */
    'no-unmodified-loop-condition': 'error',

    /**
     * This rule aims to eliminate unused expressions which have no effect on the state of the program.
     *
     * This rule does not apply to function calls or constructor calls with the `new` operator, because they could have
     * side effects on the state of the program.
     *
     * @property {object} options
     *                            - `allowShortCircuit`    {bool} Allows short circuit evaluations in expressions;
     *                                                            default: false
     *                            - `allowTernary`         {bool} Enables the use of ternary operators in expression
     *                                                            similarly to short circuit evaluations;
     *                                                            default: false
     *                            - `allowTaggedTemplates` {bool} Enables the use of tagged template literals in
     *                                                            expressions;
     *                                                            default: false
     */
    'no-unused-expressions': [
        'error',
        {
            'allowShortCircuit': true,
            'allowTernary': true,
            'allowTaggedTemplates': true,
        },
    ],

    /**
     * This rule is aimed at eliminating unused labels.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-unused-labels': 'error',

    /**
     * This rule is aimed to flag usage of `Function.prototype.call()` and `Function.prototype.apply()` that can be
     * replaced with the normal function invocation.
     */
    'no-useless-call': 'error',

    /**
     * This rule reports `catch` clauses that only `throw` the caught error.
     */
    'no-useless-catch': 'error',

    /**
     * This rule aims to flag the concatenation of 2 literals when they could be combined into a single literal.
     * Literals can be strings or template literals.
     */
    'no-useless-concat': 'off',

    /**
     * This rule flags escapes that can be safely removed without changing behavior.
     */
    'no-useless-escape': 'error',

    /**
     * This rule aims to report redundant `return` statements.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-useless-return': 'error',

    /**
     * This rule aims to eliminate use of void operator.
     */
    'no-void': 'error',

    /**
     * This rule reports comments that include any of the predefined terms specified in its configuration.
     *
     * @property {object} options
     *                            - `terms`    {array}  Terms to match;
     *                                                  default: ['todo', 'fixme', 'xxx']
     *                            - 'location` {string} Configures where in comments to check for matches;
     *                                                  default: `start`
     */
    'no-warning-comments': 'off',

    /**
     * This rule disallows `with` statements.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-with': 'error',

    /**
     * This rule is aimed at using named capture groups instead of numbered capture groups in regular expressions.
     */
    'prefer-named-capture-group': 'off',

    /**
     * This rule aims to ensure that Promises are only rejected with `Error` objects.
     *
     * @property {object} options
     *                            - `allowEmptyReject` {bool} Allows calls to `Promise.reject()` with no arguments;
     *                                                        default: false
     */
    'prefer-promise-reject-errors': 'error',

    /**
     * This rule disallows the use of the `RegExp` constructor function with string literals as its arguments.
     *
     * This rule also disallows the use of the `RegExp` constructor function with template literals without expressions
     * and `String.raw` tagged template literals without expressions.
     *
     * The rule does not disallow all use of the `RegExp` constructor. It should be still used for dynamically
     * generated regular expressions.
     */
    'prefer-regex-literals': 'off',

    /**
     * This rule is aimed at preventing the unintended conversion of a string to a number of a different base than
     * intended or at preventing the redundant `10` radix if targeting modern environments only.
     *
     * @property {string} options
     *                            - `always`    Enforces providing a radix
     *                            - `as-needed` Disallows providing the `10` radix
     *                            default: `always`
     */
    'radix': 'off',

    /**
     * This rule warns async functions which have no await expression.
     */
    'require-await': 'off',

    /**
     * This rule aims to enforce the use of `u` flag on regular expressions.
     */
    'require-unicode-regexp': 'off',

    /**
     * This rule aims to keep all variable declarations in the leading series of statements. Allowing multiple
     * declarations helps promote maintainability and is thus allowed.
     */
    'vars-on-top': 'warn',

    /**
     * This rule requires all immediately-invoked function expressions to be wrapped in parentheses.
     *
     * @property {string} wrapping
     *                             - `outside` Enforces always wrapping the `call` expression
     *                             - `inside`  Enforces always wrapping the `function` expression
     *                             - `any`     Enforces always wrapping, but allows either style
     *                             default: `outside`
     * @property {object} methods
     *                             - `functionPrototypeMethods` {bool} Enforces wrapping expression invoked using
     *                                                                 `.call` and `.apply`;
     *                                                                 default: false
     */
    'wrap-iife': [
        'error',
        'any',
        {
            'functionPrototypeMethods': true,
        },
    ],

    /**
     * This rule aims to enforce consistent style of conditions which compare a variable to a literal value.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} useYoda
     *                               - `never`  Comparisons must never be Yoda conditions
     *                               - `always` Literal value must always come first
     *                               default: `never`
     * @property {object} exceptions The `never` option can have exception options in an object literal
     *                               - `exceptRange`  {bool} Allows Yoda conditions in range comparisons which are
     *                                                       wrapped directly in parentheses, including the parentheses
     *                                                       of an `if` or `while` condition;
     *                                                       default: false
     *                               - `onlyEquality` {bool} Report Yoda conditions only for the equality operators
     *                                                       `==` and `===`;
     *                                                       default: false
     */
    'yoda': [
        'error',
        'never',
    ],
};

/**
 * These rules relate to strict mode directives.
 *
 * @type {object}
 */
let ESLintStrictMode = {
    /**
     * This rule requires or disallows strict mode directives.
     *
     * This rule disallows strict mode directives, no matter which option is specified, if ESLint configuration
     * specifies either of the following as parser options:
     *   - `"sourceType": "module"` that is, files are ECMAScript modules
     *   - `"impliedStrict": true` property in the `ecmaFeatures` object
     *
     * This rule disallows strict mode directives, no matter which option is specified, in functions with non-simple
     * parameter lists (for example, parameter lists with default parameter values) because that is a syntax error in
     * ECMAScript 2016 and later. See the examples of the function option.
     *
     * The `--fix` option on the command line does not insert new "use strict" statements, but only removes unneeded
     * statements.
     *
     * @property {string} option
     *                           - `safe`     Corresponds either of the following options:
     *                                        - `global`   If ESLint considers a file to be a CommonJS module
     *                                        - `function` Otherwise
     *                           - `global`   Requires one strict mode directive in the global scope (and disallows any
     *                                        other strict mode directives)
     *                           - `function` Requires one strict mode directive in each top-level function declaration
     *                                        or expression (and disallows any other strict mode directives)
     *                           - `never`    Disallows strict mode directives
     *                           default: `safe`
     */
    'strict': 'off',
};

/**
 * These rules relate to variable declarations.
 *
 * @type {object}
 */
let ESLintVariables = {
    /**
     * This rule is aimed at enforcing or eliminating variable initializations during declaration.
     *
     * @property {string} initDeclaration
     *                                    - `always` Enforce initialization at declaration
     *                                    - `never`  Disallow initialization during declaration
     *                                    default: `always`
     * @property {object} exceptions
     *                                    - `ignoreForLoopInit` {bool} Initialization at declaration is allowed for
     *                                                                 loops when `never` is set
     */
    'init-declarations': 'off',

    /**
     * This rule disallows the use of the delete operator on variables.
     *
     * If ESLint parses code in strict mode, the parser (instead of this rule) reports the error.
     */
    'no-delete-var': 'error',

    /**
     * This rule aims to create clearer code by disallowing the bad practice of creating a label that shares a name
     * with a variable that is in scope.
     */
    'no-label-var': 'off',

    /**
     * This rule allows you to specify global variable names that you don't want to use in your application.
     *
     * @property {string|object} This rule takes a list of strings, where each string is a global to be restricted, or
     *                           objects, where the global name and the optional custom message are specified
     */
    'no-restricted-globals': 'off',

    /**
     * This rule aims to eliminate shadowed variable declarations.
     *
     * @property {object} options
     *                            - `builtinGlobals` {bool}   Prevents shadowing of built-in global variables: e.g.:
     *                                                        `Object`, `Array`, `Number`, etc.;
     *                                                        default: false
     *                            - `hoist`          {string}
     *                                                        - `functions` Reports shadowing before the outer
     *                                                                      functions are defined
     *                                                        - `all`       Reports all shadowing before the outer
     *                                                                      variables/functions are defined
     *                                                        - `never`     Never report shadowing before the outer
     *                                                                      variables/functions are defined
     *                                                        default: `functions`
     *                            - `allow`          {array}  Identifier names for which shadowing is allowed;
     *                                                        default: []
     */
    'no-shadow': 'off',

    /**
     * This rule disallows identifiers from shadowing restricted names.
     */
    'no-shadow-restricted-names': 'error',

    /**
     * Any reference to an undeclared variable causes a warning, unless the variable is explicitly mentioned in a
     * global comment, or specified in the `globals` key in the configuration file. A common use case for these is if
     * you intentionally use globals that are defined elsewhere (e.g.: in a script sourced from HTML).
     *
     * Note that this rule does not disallow assignments to read-only global variables. See no-global-assign if you
     * also want to disallow those assignments.
     *
     * This rule also does not disallow re-declarations of global variables. See no-redeclare if you also want to
     * disallow those re-declarations.
     *
     * @property {object} options
     *                            - `typeof` {bool} Warn for variables used inside `typeof` check;
     *                                              default: false
     */
    'no-undef': [
        'error',
        {
            'typeof': false,
        },
    ],

    /**
     * This rule aims to eliminate variable declarations that initialize to undefined.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-undef-init': 'error',

    /**
     * This rule aims to eliminate the use of `undefined`, and as such, generates a warning whenever it is used.
     */
    'no-undefined': 'off',

    /**
     * This rule is aimed at eliminating unused variables, functions, and function parameters.
     *
     * A variable `foo` is considered to be used if any of the following are true:
     *   - it is called `(foo())` or constructed `(new foo())`
     *   - it is read (`var bar = foo`)
     *   - it is passed into a function as an argument (`doSomething(foo)`)
     *   - it is read inside of a function that is passed to another function (`doSomething(function() { foo(); })`)
     *
     * A variable is not considered to be used if it is only ever declared (`var foo = 5`) or assigned to (`foo = 7`).
     *
     * @property {string|object} options This rule takes one argument which can be a string or an object. The string
     *                                   settings are the same as those of the `vars` property (explained below)
     *                                   - `vars`                      {string}
     *                                                                          - `all`   Checks all variables for
     *                                                                                    usage, including those in the
     *                                                                                    global scope
     *                                                                          - `local` Checks only that locally-
     *                                                                                    declared variables are used,
     *                                                                                    but will allow global
     *                                                                                    variables to be used
     *                                                                          default: `all`
     *                                   - `varsIgnorePattern`         {string} Specifies exceptions not to check for
     *                                                                          usage: variables whose names match a
     *                                                                          regexp pattern
     *                                   - `args`                      {string}
     *                                                                          - `after-used` Unused positional
     *                                                                                         arguments that occur
     *                                                                                         before the last used
     *                                                                                         argument will not be
     *                                                                                         checked, but all named
     *                                                                                         arguments and all
     *                                                                                         positional arguments
     *                                                                                         after the last used
     *                                                                                         argument will be checked
     *                                                                          - `all`        All named arguments must
     *                                                                                         be used
     *                                                                          - `none`       Do not check arguments
     *                                   - `ignoreRestSiblings`        {bool}   Specifies exceptions not to check for
     *                                                                          usage: arguments whose names match a
     *                                                                          regexp pattern
     *                                   - `caughtErrors`              {string} Used for `catch` block arguments
     *                                                                          validation
     *                                                                          - `none` Do not check error objects
     *                                                                          - `all`  All named arguments must be
     *                                                                                   used
     *                                                                          default: `none`
     *                                   - `caughtErrorsIgnorePattern` {string} Specifies exceptions not to check for
     *                                                                          usage: catch arguments whose names
     *                                                                          match a regexp pattern
     */
    'no-unused-vars': [
        'error',
        {
            'vars': 'all',
            'args': 'none',
            'ignoreRestSiblings': true,
        },
    ],

    /**
     * This rule will warn when it encounters a reference to an identifier that has not yet been declared.
     *
     * @property {object} options
     *                            - `functions` {bool} Warns of every reference to a function before the function
     *                                                 declaration;
     *                                                 default: true
     *                            - `classes`   {bool} Warns of every reference to a class before the class
     *                                                 declaration;
     *                                                 default: true
     *                            - `variables` {bool} Warns of every reference to a variable before the variable
     *                                                 declaration;
     *                                                 default: true
     */
    'no-use-before-define': [
        'error',
        {
            'functions': false,
            'classes': false,
            'variables': false,
        },
    ],
};

/**
 * These rules relate to code running in Node.js, or in browsers with CommonJS.
 *
 * @type {object}
 */
let ESLintNodeJsAndCommonJs = {
    /**
     * This rule is aimed at ensuring that callbacks used outside of the main function block are always part-of or
     * immediately preceding a `return` statement. This rule decides what is a callback based on the name of the
     * function being called.
     *
     * @property {array} possibleCallbackNames List of possible callback names which may include object methods;
     *                                         default: ['callback', 'cb', 'next']
     */
    'callback-return': 'off',

    /**
     * This rule requires all calls to `require()` to be at the top level of the module, similar to ES6 `import` and
     * `export` statements, which also can occur only at the top level.
     */
    'global-require': 'off',

    /**
     * This rule expects that when you're using the callback pattern in Node.js you'll handle the error.
     *
     * @property {string} errorParameter The name of the error parameter;
     *                                   default: `err`
     */
    'handle-callback-err': [
        'error',
        '^(err|error)$',
    ],

    /**
     * This rule disallows calling and constructing the `Buffer()` constructor.
     */
    'no-buffer-constructor': 'off',

    /**
     * When this rule is enabled, each `var` statement must satisfy the following conditions:
     *   - either none or all variable declarations must be require declarations (default)
     *   - all `require` declarations must be of the same type (grouping)
     *
     * This rule distinguishes between six kinds of variable declaration types:
     *   - `core`: declaration of a required core module
     *   - `file`: declaration of a required file module
     *   - `module`: declaration of a required module from the node_modules folder
     *   - `computed`: declaration of a required module whose type could not be determined (either because it is
     *     computed or because require was called without an argument)
     *   - `uninitialized`: a declaration that is not initialized
     *   - `other`: any other kind of declaration
     *
     * @property {object} options
     *                            - `grouping`  All `require` declarations must be of the same type;
     *                                          default: false
     *                            - `allowCall` Allow modules to be called from `require` declarations(?);
     *                                          default: false
     */
    'no-mixed-requires': 'off',

    /**
     * This rule aims to eliminate use of the `new require` expression.
     */
    'no-new-require': 'error',

    /**
     * This rule aims to prevent string concatenation of directory paths in Node.js.
     */
    'no-path-concat': 'error',

    /**
     * This rule is aimed at discouraging use of `process.env` to avoid global dependencies. As such, it will warn
     * whenever `process.env` is used.
     */
    'no-process-env': 'off',

    /**
     * This rule aims to prevent the use of `process.exit()` in Node.js JavaScript. As such, it warns whenever
     * `process.exit()` is found in code.
     */
    'no-process-exit': 'off',

    /**
     * This rule allows you to specify modules that you don’t want to use in your application.
     *
     * @property {strings|objects} The names of restricted modules
     */
    'no-restricted-modules': 'off',

    /**
     * This rule is aimed at preventing synchronous methods from being called in Node.js. It looks specifically for the
     * method suffix "`Sync`" (as is the convention with Node.js operations).
     *
     * @property {object} options
     *                            - `allowAtRootLevel` {bool} Determines whether synchronous methods should be allowed
     *                                                        at the top level of a file, outside of any functions;
     *                                                        default: false
     */
    'no-sync': 'off',
};

/**
 * These rules relate to style guidelines, and are therefore quite subjective.
 *
 * @type {object}
 */
let ESLintStylisticIssues = {
    /**
     * This rule enforces line breaks after opening and before closing array brackets.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`            Requires line breaks inside brackets
     *                                   - `never`             Disallows line breaks inside brackets
     *                                   - `consistent`        Requires consistent usage of linebreaks for each pair of
     *                                                         brackets; it reports an error if one bracket in the pair
     *                                                         has a linebreak inside it and the other bracket does not
     *                                   - `multiline`  {bool} Requires line breaks if there are line breaks inside
     *                                                         elements or between elements;
     *                                                         default: true
     *                                   - `minItems`   {int}  Requires line breaks if the number of elements is at
     *                                                         least the given integer; if this is 0, this condition
     *                                                         will act the same as the option `always` - if it is
     *                                                         `null`, this condition is disabled;
     *                                                         default: null
     */
    'array-bracket-newline': [
        'error',
        {
            'multiline': true,
            'minItems': null,
        },
    ],

    /**
     * This rule enforces consistent spacing inside array brackets.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                               - `never`  Disallows spaces inside array brackets
     *                               - `always` Requires one or more spaces or newlines inside array brackets
     *                               default: `never`
     * @property {object} exceptions
     *                               - exceptions to the `never` option
     *                                 - `singleValue`     {bool} Requires one or more spaces or newlines inside of
     *                                                            brackets of array literals that contain a single
     *                                                            element (if true)
     *                                 - `objectsInArrays` {bool} Requires one or more spaces or newlines between
     *                                                            brackets of array literals and braces of their object
     *                                                            literal elements `[ {` or `} ]` (if true)
     *                                 - `arraysInArrays`  {bool} Requires one or more spaces or newlines between
     *                                                            brackets of array literals and brackets of their
     *                                                            array literal elements `[ [` or `] ]` (if true)
     *                               - exceptions to the `always` option
     *                                 - `singleValue`     {bool} Disallows spaces inside brackets of array literals
     *                                                            that contain a single element (if false)
     *                                 - `objectsInArrays` {bool} Disallows spaces between brackets of array literals
     *                                                            and braces of their object literal elements `[ {` or
     *                                                            `} ]` (if false)
     *                                 - `arraysInArrays`  {bool} Disallows spaces between brackets of array literals
     *                                                            and brackets of their array literal elements `[ [` or
     *                                                            `] ]` (if false)
     */
    'array-bracket-spacing': [
        'error',
        'never',
    ],

    /**
     * This rule enforces line breaks between array elements.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`            Requires line breaks between array elements
     *                                   - `never`             Disallows line breaks between array elements
     *                                   - `consistent`        Requires consistent usage of linebreaks between array
     *                                                         elements
     *                                   - `multiline`  {bool} Requires line breaks if there are line breaks inside
     *                                                         elements
     *                                   - `minItems`   {int}  Requires line breaks if the number of elements is at
     *                                                         least the given integer; if this is 0, this condition
     *                                                         will act the same as the option `always` - if it is
     *                                                         `null`, this condition is disabled;
     *                                                         default: null
     *                                   default: `always`
     */
    'array-element-newline': [
        'error',
        {
            'multiline': true,
            'minItems': null,
        },
    ],

    /**
     * This rule enforces consistent spacing inside an open block token and the next token on the same line. This rule
     * also enforces consistent spacing inside a close block token and previous token on the same line.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `always` Requires one or more spaces
     *                           - `never`  Disallows spaces
     *                           default: `always`
     */
    'block-spacing': [
        'error',
        'always',
    ],

    /**
     * This rule enforces consistent brace style for blocks.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                              - `1tbs`       Enforces one true brace style
     *                              - `stroustrup` Enforces Stroustrup style
     *                              - `allman`     Enforces Allman style
     *                              default: `1tbs`
     * @property {object} exception
     *                              - `allowSingleLine` Allows the opening and closing braces for a block to be on the
     *                                                  same line;
     *                                                  default: false
     */
    'brace-style': [
        'error',
        '1tbs',
        {
            'allowSingleLine': false,
        },
    ],

    /**
     * This rule looks for any underscores (`_`) located within the source code. It ignores leading and trailing
     * underscores and only checks those in the middle of a variable name. If ESLint decides that the variable is a
     * constant (all uppercase), then no warning will be thrown. Otherwise, a warning will be thrown. This rule only
     * flags definitions and assignments but not function calls. In case of ES6 `import` statements, this rule only
     * targets the name of the variable that will be imported into the local module scope.
     *
     * @property {object} options
     *                            - `properties`          {string} When to enforce camelcase style for property names;
     *                                                             values: `always` / `never`;
     *                                                             default: `always`
     *                            - `ignoreDestructuring` {bool}   Whether to ignore camelcase style for destructured
     *                                                             identifiers;
     *                                                             default: false
     *                            - `ignoreImports`       {bool}   Whether to ignore camelcase style for ES2015
     *                                                             imports;
     *                                                             default: false
     *                            - `allow`               {string} List of properties to accept;
     *                                                             accepts regex
     */
    'camelcase': [
        'error',
        {
            'properties': 'never',
        },
    ],

    /**
     * This rule aims to enforce a consistent style of comments across your codebase, specifically by either requiring
     * or disallowing a capitalized letter as the first word character in a comment. This rule will not issue warnings
     * when non-cased letters are used.
     *
     * By default, this rule will require a non-lowercase letter at the beginning of comments.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} enforce Whether capitalization of the first word of a comment should be required or forbidden
     * @property {object} options
     *                            - `ignorePattern`             {string} Regular expression pattern of words that
     *                                                                   should be ignored
     *                            - `ignoreInlineComments`      {bool}   Whether to ignore comments in the middle of
     *                                                                   code;
     *                                                                   default: false
     *                            - `ignoreConsecutiveComments` {bool}   Whether to ignore comments immediately
     *                                                                   following another comment;
     *                                                                   default: false
     *
     */
    'capitalized-comments': 'off',

    /**
     * This rule enforces consistent use of trailing commas in object and array literals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - 'never`                     Disallows trailing commas
     *                                   - `always`                    Requires trailing commas
     *                                   - `always-multiline`          Requires trailing commas when the last element
     *                                                                 or property is in a different line than the
     *                                                                 closing `]` or `}` and disallows trailing commas
     *                                                                 when the last element or property is on the same
     *                                                                 line as the closing `]` or `}`
     *                                   - `only-multiline`            Allows (but does not require) trailing commas
     *                                                                 when the last element or property is in a
     *                                                                 different line than the closing `]` or `}` and
     *                                                                 disallows trailing commas when the last element
     *                                                                 or property is on the same line as the closing
     *                                                                 `]` or `}`
     *                                   - `arrays`           {string} Array literals and array patterns of
     *                                                                 destructuring (e.g.: `let [a,] = [1,];`);
     *                                                                 default: `never`
     *                                   - `objects`          {string} Object literals and object patterns of
     *                                                                 destructuring (e.g.: `let {a,} = {a: 1};`);
     *                                                                 default: `never`
     *                                   - `imports`          {string} Import declarations of ES Modules (e.g.: `import
     *                                                                {a,} from 'foo';`);
     *                                                                 default: `never`
     *                                   - `exports`          {string} Export declarations of ES Modules (e.g.: `export
     *                                                                 {a,};`);
     *                                                                 default: `never`
     *                                   - `functions`        {string} Function declarations and function calls (e.g.:
     *                                                                 `(function(a,){ })(b,);`);
     *                                                                 default: `never`
     *                                   default: `never`
     */
    'comma-dangle': [
        'error',
        {
            'arrays': 'always-multiline',
            'objects': 'always-multiline',
            'imports': 'always-multiline',
            'exports': 'always-multiline',
            'functions': 'never',
        },
    ],

    /**
     * This rule enforces consistent spacing before and after commas in variable declarations, array literals, object
     * literals, function parameters, and sequences.
     *
     * This rule does not apply in an `ArrayExpression` or `ArrayPattern` in either of the following cases:
     *   - adjacent null elements
     *   - an initial null element, to avoid conflicts with the `array-bracket-spacing` rule
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`  {bool} Whether to require/disallow spaces after commas;
     *                                              default: true
     *                            - `before` {bool} Whether to require/disallow spaces before commas;
     *                                              default: false
     */
    'comma-spacing': [
        'error',
        {
            'after': true,
            'before': false,
        },
    ],

    /**
     * This rule enforce consistent comma style in array literals, object literals, and variable declarations.
     *
     * This rule does not apply in either of the following cases:
     *   - comma preceded and followed by linebreak (lone comma)
     *   - single-line array literals, object literals, and variable declarations
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} location
     *                               - `last`  Requires a comma after and on the same line as an array element, object
     *                                         property, or variable declaration
     *                               - `first` Requires a comma before and on the same line as an array element, object
     *                                         property, or variable declaration
     *                               default: `last`
     * @property {object} exceptions
     *                               - `ArrayExpression`         {bool} Whether to ignore comma style in array literals
     *                               - `ArrayPattern`            {bool} Whether to ignore comma style in array patterns
     *                                                                  of destructuring
     *                               - `ArrowFunctionExpression` {bool} Whether to ignore comma style in the parameters
     *                                                                  of arrow function expression
     *                               - `CallExpression`          {bool} Whether to ignore comma style in the arguments
     *                                                                  of function calls
     *                               - `FunctionDeclaration`     {bool} Whether to ignore comma style in the parameters
     *                                                                  of function declarations
     *                               - `FunctionExpression`      {bool} Whether to ignore comma style in the parameters
     *                                                                  of function expressions
     *                               - `ImportDeclaration`       {bool} Whether to ignore comma style in the specifiers
     *                                                                  of import declarations
     *                               - `ObjectExpression`        {bool} Whether to ignore comma style in object
     *                                                                  literals
     *                               - `ObjectPattern`           {bool} Whether to ignore comma style in object
     *                                                                  patterns of destructuring
     *                               - `VariableDeclaration`     {bool} Whether to ignore comma style in variable
     *                                                                  declarations
     *                               - `NewExpression`           {bool} Whether to ignore comma style in the parameters
     *                                                                  of constructor expressions
     */
    'comma-style': [
        'error',
        'last',
    ],

    /**
     * This rule enforces consistent spacing inside computed property brackets.
     *
     * It either requires or disallows spaces between the brackets and the values inside of them. This rule does not
     * apply to brackets that are separated from the adjacent value by a newline.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} spacing
     *                            - `never`  Disallows spaces inside computed property brackets
     *                            - `always` Requires one or more spaces inside computed property brackets
     *                            default: `never`
     * @property {object} options
     *                            - `enforceForClassMembers` {bool} Whether to additionally apply this rule to class
     *                                                              members;
     *                                                              default: false
     */
    'computed-property-spacing': [
        'error',
        'never',
    ],

    /**
     * This rule enforces two things about variables with the designated alias names for `this`:
     *   - if a variable with a designated name is declared, it must be either initialized (in the declaration) or
     *     assigned (in the same scope as the declaration) the value `this`.
     *   - if a variable is initialized or assigned the value `this`, the name of the variable must be a designated
     *     alias.
     *
     * @property {string} aliasNames List of designated alias names for `this`;
     *                               default: `that`
     */
    'consistent-this': 'off',

    /**
     * This rule enforces at least one newline (or absence thereof) at the end of non-empty files.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `always` Enforces that files end with a newline (LF)
     *                           - `never`  Enforces that files do not end with a newline
     *                           default: `always`
     */
    'eol-last': [
        'error',
        'always',
    ],

    /**
     * This rule requires or disallows spaces between the function name and the opening parenthesis that calls it.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `never`  Disallows space between the function name and the opening parenthesis
     *                           - `always` Requires space between the function name and the opening parenthesis
     *                           default: `never`
     */
    'func-call-spacing': [
        'error',
        'never',
    ],

    /**
     * This rule requires function names to match the name of the variable or property to which they are assigned. The
     * rule will ignore property assignments where the property name is a literal that is not a valid identifier in the
     * ECMAScript version specified in your configuration (default ES5).
     *
     * @property {string} require
     *                            - `always` Require function names to match the name of the variable or property to
     *                                       which they are assigned
     *                            - `never`  The opposite of `always`
     *                            default: `always`
     * @property {object} options
     *                            - `considerPropertyDescriptor`   {bool} The check will take into account the use of
     *                                                                    `Object.create`, `Object.defineProperty`,
     *                                                                    `Object.defineProperties`, and
     *                                                                    `Reflect.defineProperty`;
     *                                                                    default: false
     *                            - `includeCommonJSModuleExports` {bool} The check will check `module.exports` and
     *                                                                    `module['exports']`;
     *                                                                    default: false
     */
    'func-name-matching': 'off',

    /**
     * This rule can enforce or disallow the use of named function expressions.
     *
     * @property {string} require
     *                            - `always`    Requires function expressions to have a name
     *                            - `as-needed` Requires function expressions to have a name if the name cannot be
     *                                          assigned automatically in an ES6 environment
     *                            - `never`     Disallows named function expressions, except in recursive functions,
     *                                          where a name is needed
     *                            default: `always`
     * @property {object} options
     *                            - `generators` {string}
     *                                                    - `always`    Require named generators
     *                                                    - `as-needed` Require named generators if the name cannot be
     *                                                                  assigned automatically in an ES6 environment
     *                                                    - `never`     Disallow named generators where possible
     */
    'func-names': 'off',

    /**
     * This rule enforces a particular type of function style throughout a JavaScript file, either declarations or
     * expressions. You can specify which you prefer in the configuration.
     *
     * @property {string} type
     *                           - `expression`  Requires the use of function expressions instead of function
     *                                           declarations
     *                           - `declaration` Requires the use of function declarations instead of function
     *                                           expressions
     *                           default: `expression`
     * @property {object} option
     *                           - `allowArrowFunctions` {bool} Allow the use of arrow functions (honored only when
     *                                                          using `declaration`);
     *                                                          default: false
     */
    'func-style': 'off',

    /**
     * This rule enforces line breaks between arguments of a function call.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `always`     Requires line breaks between arguments
     *                           - `never`      Disallows line breaks between arguments
     *                           - `consistent` Requires consistent usage of line breaks between arguments
     *                           default: `always`
     */
    'function-call-argument-newline': [
        'error',
        'consistent',
    ],

    /**
     * This rule enforces consistent line breaks inside parentheses of function parameters or arguments.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`                    Requires line breaks inside all function
     *                                                                 parentheses
     *                                   - `never`                     Disallows line breaks inside all function
     *                                                                 parentheses
     *                                   - `multiline`                 Requires linebreaks inside function parentheses
     *                                                                 if any of the parameters/arguments have a line
     *                                                                 break between them - otherwise, it disallows
     *                                                                 linebreaks
     *                                   - `multiline-arguments`       Works like `multiline` but allows linebreaks
     *                                                                 inside function parentheses if there is only one
     *                                                                 parameter/argument
     *                                   - `consistent`                Requires consistent usage of linebreaks for
     *                                                                 each pair of parentheses - it reports an error
     *                                                                 if one parenthesis in the pair has a linebreak
     *                                                                 inside it and the other does not
     *                                   - `minItems`            {int} Requires linebreaks inside function parentheses
     *                                                                 if the number of parameters/arguments is at
     *                                                                 least the min - otherwise, it disallows
     *                                                                 linebreaks
     *                                   default: `multiline`
     */
    'function-paren-newline': [
        'error',
        'consistent',
    ],

    /**
     * This rule disallows specified identifiers in assignments and function definitions.
     *
     * This rule will catch blacklisted identifiers that are:
     *   - variable declarations
     *   - function declarations
     *   - object properties assigned to during object creation
     *
     * It will not catch blacklisted identifiers that are:
     *   - function calls (so you can still use functions you do not have control over)
     *   - object properties (so you can still use objects you do not have control over)
     *
     * @property {strings} restrictedIdentifiers List of names of restricted identifiers
     */
    'id-blacklist': 'off',

    /**
     * This rule enforces a minimum and/or maximum identifier length convention.
     *
     * @property {object} options
     *                            - `min`        {int}    Enforces a minimum identifier length;
     *                                                    default: 2
     *                            - `max`        {int}    Enforces a maximum identifier length;
     *                                                    default: infinity
     *                            - `properties` {string} Enforces identifier length convention for property names;
     *                                                    default: `always`
     *                            - `exceptions` {array}  Array of exempt identifier names
     */
    'id-length': 'off',

    /**
     * This rule requires identifiers in assignments and `function` definitions to match a specified regular
     * expression.
     *
     * @property {string} regex Regular expression specifying a naming convention
     * @property {object} options
     *                            - `properties`          {bool} Requires object properties to match the specified
     *                                                           regular expression;
     *                                                           default: false
     *                            - `onlyDeclarations`    {bool} Requires only `var`, `function`, and `class`
     *                                                           declarations to match the specified regular
     *                                                           expression;
     *                                                           default: false
     *                            - `ignoreDestructuring` {bool} Whether to ignore destructured identifiers;
     *                                                           default: false
     */
    'id-match': 'off',

    /**
     * This rule aims to enforce a consistent location for an arrow function containing an implicit return.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `beside` Disallows a newline before an arrow function body
     *                           - `below`  Requires a newline before an arrow function body
     *                           default: `beside`
     */
    'implicit-arrow-linebreak': [
        'error',
        'beside',
    ],

    /**
     * This rule enforces a consistent indentation style. The default style is `4 spaces`.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {int|string} type    Indentation type;
     *                                default: 4
     * @property {object}     options;
     *                                - `SwitchCase`             {int}        Enforces indentation level for `case`
     *                                                                        clauses in `switch` statements;
     *                                                                        default: 0
     *                                - `VariableDeclarator`     {int|string} Enforces indentation level for `var`
     *                                                                        declarators; can also take an object to
     *                                                                        define separate rules for `var`, `let`
     *                                                                        and `const` declarations. It can also be
     *                                                                        `first`, indicating all the declarators
     *                                                                        should be aligned with the first
     *                                                                        declarator;
     *                                                                        default: 1
     *                                - `outerIIFEBody`          {int}        Enforces indentation level for file-level
     *                                                                        IIFEs;
     *                                                                        default: 1
     *                                - `MemberExpression`       {int|string} Enforces indentation level for multi-line
     *                                                                        property chains. This can also be set to
     *                                                                        `off` to disable checking for
     *                                                                        `MemberExpression` indentation;
     *                                                                        default: 1
     *                                - `FunctionDeclaration`    {object}     Takes an object to define rules for
     *                                                                        function declarations
     *                                                                        - `parameters` {int|string} Enforces
     *                                                                                                    indentation
     *                                                                                                    level for
     *                                                                                                    parameters in
     *                                                                                                    a function
     *                                                                                                    declaration.
     *                                                                                                    This can
     *                                                                                                    either be a
     *                                                                                                    number
     *                                                                                                    indicating
     *                                                                                                    indentation
     *                                                                                                    level, or the
     *                                                                                                    string
     *                                                                                                    `first`
     *                                                                                                    indicating
     *                                                                                                    that all
     *                                                                                                    parameters of
     *                                                                                                    the
     *                                                                                                    declaration
     *                                                                                                    must be
     *                                                                                                    aligned with
     *                                                                                                    the first
     *                                                                                                    parameter.
     *                                                                                                    This can also
     *                                                                                                    be set to
     *                                                                                                    `off` to
     *                                                                                                    disable
     *                                                                                                    checking for
     *                                                                                                    `FunctionDeclaration`
     *                                                                                                    parameters;
     *                                                                                                    default: 1
     *                                                                        - `body`       {int}        Enforces
     *                                                                                                    indentation
     *                                                                                                    level for the
     *                                                                                                    body of a
     *                                                                                                    function
     *                                                                                                    declaration;
     *                                                                                                    default: 1
     *                                - `FunctionExpression`     {object}     Takes an object to define rules for
     *                                                                        function expressions;
     *                                                                        - `parameters` {int|string} Enforces
     *                                                                                                    indentation
     *                                                                                                    level for
     *                                                                                                    parameters in
     *                                                                                                    a function
     *                                                                                                    expression.
     *                                                                                                    This can
     *                                                                                                    either be a
     *                                                                                                    number
     *                                                                                                    indicating
     *                                                                                                    indentation
     *                                                                                                    level, or the
     *                                                                                                    string
     *                                                                                                    `first`
     *                                                                                                    indicating
     *                                                                                                    that all
     *                                                                                                    parameters of
     *                                                                                                    the
     *                                                                                                    expression
     *                                                                                                    must be
     *                                                                                                    aligned with
     *                                                                                                    the first
     *                                                                                                    parameter.
     *                                                                                                    This can also
     *                                                                                                    be set to
     *                                                                                                    `off` to
     *                                                                                                    disable
     *                                                                                                    checking for
     *                                                                                                    `FunctionExpression`
     *                                                                                                    parameters;
     *                                                                                                    default: 1
     *                                                                        - `body`       {int}        Enforces
     *                                                                                                    indentation
     *                                                                                                    level for the
     *                                                                                                    body of a
     *                                                                                                    function
     *                                                                                                    expression;
     *                                                                                                    default: 1
     *                                - `CallExpression`         {object}     Takes an object to define rules for
     *                                                                        function call expressions;
     *                                                                        - `arguments` {int} Enforces indentation
     *                                                                                            level for arguments
     *                                                                                            in a call expression.
     *                                                                                            This can either be a
     *                                                                                            number indicating
     *                                                                                            indentation level, or
     *                                                                                            the string `first`
     *                                                                                            indicating that all
     *                                                                                            arguments of the
     *                                                                                            expression must be
     *                                                                                            aligned with the
     *                                                                                            first argument. This
     *                                                                                            can also be set to
     *                                                                                            `off` to disable
     *                                                                                            checking for
     *                                                                                            `CallExpression`
     *                                                                                            arguments;
     *                                                                                            default: 1
     *                                - `ArrayExpression`        {int}        Enforces indentation level for elements
     *                                                                        in arrays. It can also be set to the
     *                                                                        string `first`, indicating that all the
     *                                                                        elements in the array should be aligned
     *                                                                        with the first element. This can also be
     *                                                                        set to `off` to disable checking for
     *                                                                        array elements;
     *                                                                        default: 1
     *                                - `ObjectExpression`       {int}        Enforces indentation level for properties
     *                                                                        in objects. It can be set to the string
     *                                                                        `first`, indicating that all properties
     *                                                                        in the object should be aligned with the
     *                                                                        first property. This can also be set to
     *                                                                        `off` to disable checking for object
     *                                                                        properties;
     *                                                                        default: 1
     *                                - `ImportDeclaration`      {int}        Enforces indentation level for import
     *                                                                        statements. It can be set to the string
     *                                                                        `first`, indicating that all imported
     *                                                                        members from a module should be aligned
     *                                                                        with the first member in the list. This
     *                                                                        can also be set to `off` to disable
     *                                                                        checking for imported module members;
     *                                                                        default: 1
     *                                - `flatTernaryExpressions` {bool}       Requires no indentation for ternary
     *                                                                        expressions which are nested in other
     *                                                                        ternary expressions;
     *                                                                        default: false
     *                                - `ignoredNodes`           {array}      Accepts an array of selectors. If an AST
     *                                                                        node is matched by any of the selectors,
     *                                                                        the indentation of tokens which are
     *                                                                        direct children of that node will be
     *                                                                        ignored. This can be used as an escape
     *                                                                        hatch to relax the rule if you disagree
     *                                                                        with the indentation that it enforces for
     *                                                                        a particular syntactic pattern;
     *                                - `ignoreComments`         {bool}       Can be used when comments do not need to
     *                                                                        be aligned with nodes on the previous or
     *                                                                        next line
     *                                                                        default: false
     */
    'indent': [
        'error',
        4,
        {
            'SwitchCase': 1,
            'VariableDeclarator': {
                'var': 1,
                'let': 1,
                'const': 1,
            },
            'outerIIFEBody': 1,
            'MemberExpression': 1,
            'FunctionDeclaration': {
                'parameters': 1,
                'body': 1,
            },
            'FunctionExpression': {
                'parameters': 1,
                'body': 1,
            },
            'CallExpression': {
                'arguments': 1,
            },
            'ArrayExpression': 1,
            'ObjectExpression': 1,
            'ImportDeclaration': 1,
            'flatTernaryExpressions': false,
            'ignoreComments': false,
            'ignoredNodes': [
                'TemplateLiteral *',
            ],
        },
    ],

    /**
     * This rule enforces the consistent use of either double or single quotes in JSX attributes.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                            - `prefer-double` Enforce the use of double quotes for all JSX attribute values that
     *                                              don't contain a double quote
     *                            - `prefer-single` Enforce the use of single quotes for all JSX attribute values that
     *                                              don't contain a single quote
     *                            default: `prefer-double`
     */
    'jsx-quotes': 'off',

    /**
     * This rule enforces consistent spacing between keys and values in object literal properties. In the case of long
     * lines, it is acceptable to add a new line wherever whitespace is allowed.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `beforeColon` {bool}          Require/Disallow spaces between the key and the colon
     *                                                            in object literals;
     *                            default: false
     *                            - `afterColon`  {bool}          Require/Disallow spaces between the colon and the
     *                                                            value in object literals;
     *                            default: true
     *                            - `mode`        {string}
     *                                                            - `strict`  Enforces exactly one space before or
     *                                                                        after colons in object literals
     *                                                            - `minimum` Enforces one or more spaces before or
     *                                                                        after colons in object literals
     *                                                            default: `strict`
     *                            - `align`       {string|object}
     *                                                            - `value`  Enforces horizontal alignment of values in
     *                                                                       object literals
     *                                                            - `colon`  Enforces horizontal alignment of both
     *                                                                       colons and values in object literals
     *                                                            - {object} Allows for fine-grained spacing when
     *                                                                       values are being aligned in object
     *                                                                       literals;
     *                                                                       keys: `beforeColon`, `afterColon`, `mode`,
     *                                                                       `on`
     *                            - `singleLine`  {object}        Specifies a spacing style for single-line object
     *                                                            literals;
     *                                                            keys: `beforeColon`, `afterColon`, `mode`, `on`
     *                            - `multiLine`   {object}        Specifies a spacing style for multi-line object
     *                                                            literals;
     *                                                            keys: `beforeColon`, `afterColon`, `mode`, `on`,
     *                                                            `align`
     *
     */
    'key-spacing': [
        'error',
        {
            'beforeColon': false,
            'afterColon': true,
        },
    ],

    /**
     * This rule enforces consistent spacing around keywords and keyword-like tokens: `as` (in module declarations),
     * `async` (of async functions), `await` (of await expressions), `break`, `case`, `catch`, `class`, `const`,
     * `continue`, `debugger`, `default`, `delete`, `do`, `else`, `export`, `extends`, `finally`, `for`, `from` (in
     * module declarations), `function`, `get` (of getters), `if`, `import`, `in`, `instanceof`, `let`, `new`, `of` (in
     * for-of statements), `return`, `set` (of setters), `static`, `super`, `switch`, `this`, `throw`, `try`, `typeof`,
     * `var`, `void`, `while`, `with`, and `yield`. This rule is designed carefully not to conflict with other spacing
     * rules: it does not apply to spacing where other rules report problems.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`     {bool}   Requires/Disallows spaces after keywords;
     *                                                   default: true
     *                            - `before`    {bool}   Requires/Disallows spaces before keywords;
     *                                                   default: true
     *                            - `overrides` {object} Allows overriding spacing style for specified keywords
     */
    'keyword-spacing': [
        'error',
        {
            'after': true,
            'before': true,
        },
    ],

    /**
     * This rule enforces consistent position of line comments. Block comments are not affected by this rule. By
     * default, this rule ignores comments starting with the following words: `eslint`, `jshint`, `jslint`, `istanbul`,
     * `global`, `exported`, `jscs`, `falls through`.
     *
     * @property {string|object} options
     *                                   - `position`                   {object}
     *                                                                                 - `above`  Enforces line
     *                                                                                            comments only above
     *                                                                                            code, in its own line
     *                                                                                 - `beside` Enforces line
     *                                                                                            comments only at the
     *                                                                                            end of code lines
     *                                   - `ignorePattern`              {string|regex} Ignore comments starting with
     *                                                                                 the provided string/regular
     *                                                                                 expression
     *                                   - `applyDefaultIgnorePatterns` {bool}         Default ignore patterns are
     *                                                                                 applied even when
     *                                                                                 `ignorePattern` is provided;
     *                                                                                 default: true
     */
    'line-comment-position': [
        'error',
        {
            'position': 'above',
            'applyDefaultIgnorePatterns': true,
        },
    ],

    /**
     * This rule enforces consistent line endings independent of operating system, VCS, or editor used across your
     * codebase.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} style
     *                          - `unix`    Enforces the usage of Unix line endings: `\n` for LF.
     *                          - `windows` Enforces the usage of Windows line endings: `\r\n` for CRLF.
     *                          default: `unix`
     */
    'linebreak-style': [
        'error',
        'unix',
    ],

    /**
     * This rule requires empty lines before and/or after comments. It can be enabled separately for both block (`/*`)
     * and line (`//`) comments. This rule does not apply to comments that appear on the same line as code and does not
     * require empty lines at the beginning or end of a file.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `beforeBlockComment`         {bool}  Requires an empty line before block comments;
     *                                                                   default: true
     *                            - `afterBlockComment`          {bool}  Requires an empty line after block comments
     *                            - `beforeLineComment`          {bool}  Requires an empty line before line comments
     *                            - `afterLineComment`           {bool}  Requires an empty line after line comments
     *                            - `allowBlockStart`            {bool}  Allows comments to appear at the start of
     *                                                                   block statements
     *                            - `allowBlockEnd`              {bool}  Allows comments to appear at the end of block
     *                                                                   statements
     *                            - `allowObjectStart`           {bool}  Allows comments to appear at the start of
     *                                                                   object literals
     *                            - `allowObjectEnd`             {bool}  Allows comments to appear at the end of object
     *                                                                   literals
     *                            - `allowArrayStart`            {bool}  Allows comments to appear at the start of
     *                                                                   array literals
     *                            - `allowArrayEnd`              {bool}  Allows comments to appear at the end of array
     *                                                                   literals
     *                            - `allowClassStart`            {bool}  Allows comments to appear at the start of
     *                                                                   classes
     *                            - `allowClassEnd`              {bool}  Allows comments to appear at the end of
     *                                                                   classes
     *                            - `applyDefaultIgnorePatterns` {bool}  Enables the default comment patterns to be
     *                                                                   ignored
     *                            - `ignorePattern`              {regex} Custom patterns to be ignored
     */
    'lines-around-comment': 'off',

    /**
     * This rule improves readability by enforcing lines between class members. It will not check empty lines before
     * the first member and after the last member, since that is already taken care of by padded-blocks.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} emptyLine
     *                              - `always` Require an empty line after class members
     *                              - `never`  Disallows an empty line after class members
     *                              default: `always`
     * @property {object} options
     *                              - `exceptAfterSingleLine` {bool} Whether to skip checking empty lines after single-
     *                                                               line class members;
     *                                                               default: false
     */
    'lines-between-class-members': [
        'error',
        'always',
        {
            'exceptAfterSingleLine': false,
        },
    ],

    /**
     * This rule enforces a maximum depth that blocks can be nested to reduce code complexity.
     *
     * @property {int|object} options
     *                                - `max` {int} Enforces a maximum depth that blocks can be nested;
     *                                              default: 4
     */
    'max-depth': 'off',

    /**
     * This rule enforces a maximum line length to increase code readability and maintainability. The length of a line
     * is defined as the number of Unicode characters in the line.
     *
     * @property {int|object} options
     *                                - `code`                   {int}        Enforces a maximum line length;
     *                                                                        default: 80
     *                                - `tabWidth`               {int}        Specifies the character width for tab
     *                                                                        characters;
     *                                                                        default: 4
     *                                - `comments`               {int|string} Enforces a maximum line length for
     *                                                                        comments;
     *                                                                        default: `code`
     *                                - `ignorePattern`          {regex}      Ignores lines matching a regular
     *                                                                        expression; can only match a single line
     *                                                                        and need to be double escaped when
     *                                                                        written in YAML or JSON
     *                                - `ignoreComments`         {bool}       Ignores all trailing comments and
     *                                                                        comments on their own line;
     *                                                                        default: false
     *                                - `ignoreTrailingComments` {bool}       Ignores only trailing comments;
     *                                                                        default: false
     *                                - `ignoreUrls`             {bool}       Ignores lines that contain a URL;
     *                                                                        default: false
     *                                - `ignoreStrings`          {bool}       Ignores lines that contain double-quoted
     *                                                                        or single-quoted string;
     *                                                                        default: false
     *                                - `ignoreTemplateLiterals` {bool}       Ignores lines that contain a template
     *                                                                        literal;
     *                                                                        default: false
     *                                - `ignoreRegExpLiterals`   {bool}       Ignores lines that contain a RegExp
     *                                                                        literal;
     *                                                                        default: false
     */
    'max-len': 'off',

    /**
     * This rule enforces a maximum number of lines per file, in order to aid in maintainability and reduce complexity.
     *
     * @property {int|object} options
     *                                - `max`            {int}  Enforces a maximum number of lines in a file;
     *                                                          default: 300
     *                                - `skipBlankLines` {bool} Ignore lines made up purely of whitespace;
     *                                                          default: false
     *                                - `skipComments`   {bool} Ignore lines containing just comments;
     *                                                          default: false
     */
    'max-lines': 'off',

    /**
     * This rule enforces a maximum number of lines per function, in order to aid in maintainability and reduce
     * complexity.
     *
     * @property {object} options
     *                            - `max`            {int}  Enforces a maximum number of lines in a function;
     *                                                      default: 50
     *                            - `skipBlankLines` {bool} Ignore lines made up purely of whitespace;
     *                                                      default: false
     *                            - `skipComments`   {bool} Ignore lines containing just comments;
     *                                                      default: false
     *                            - `IIFEs`          {bool} Include any code included in IIFEs;
     *                                                      default: false
     */
    'max-lines-per-function': 'off',

    /**
     * This rule enforces a maximum depth that callbacks can be nested to increase code clarity.
     *
     * @property {int|object} options
     *                                - `max` {int} Enforces a maximum depth that callbacks can be nested;
     *                                              default: 10
     */
    'max-nested-callbacks': 'off',

    /**
     * This rule enforces a maximum number of parameters allowed in function definitions.
     *
     * @property {int|object} options
     *                                - `max` {int} Enforces a maximum number of parameters in function definitions;
     *                                              default: 3
     */
    'max-params': 'off',

    /**
     * This rule enforces a maximum number of statements allowed in function blocks.
     *
     * @property {int|object} options
     *                                - `max` {int} Enforces a maximum number of statements allowed in function blocks;
     *                                              default: 10
     * @property {object}     ignore
     *                                - `ignoreTopLevelFunctions` {bool} Ignores top-level functions;
     *                                                                   default: false
     */
    'max-statements': 'off',

    /**
     * This rule enforces a maximum number of statements allowed per line.
     *
     * @property {object} options
     *                            - `max` {int} Enforces a maximum number of statements allowed per line;
     *                                          default: 1
     */
    'max-statements-per-line': 'off',

    /**
     * This rule aims to enforce a particular style for multiline comments.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} style
     *                          - `starred-block`  Disallows consecutive line comments in favor of block comments.
     *                                             Additionally, requires block comments to have an aligned `*`
     *                                             character before each line
     *                          - `bare-block`     Disallows consecutive line comments in favor of block comments, and
     *                                             disallows block comments from having a `*` character before each
     *                                             line
     *                          - `separate-lines` Disallows block comments in favor of consecutive line comments
     *                          default: `starred-block`
     */
    'multiline-comment-style': 'off',

    /**
     * This rule enforces or disallows newlines between operands of a ternary expression.
     *
     * @property {string} options
     *                            - `always`           Enforces newlines between the operands of a ternary expression
     *                            - `always-multiline` Enforces newlines between the operands of a ternary expression
     *                                                 if the expression spans multiple lines
     *                            - `never`            Disallows newlines between the operands of a ternary expression
     *                                                 (enforcing that the entire ternary expression is on one line)
     *                            default: `always`
     */
    'multiline-ternary': 'off',

    /**
     * This rule requires constructor names to begin with a capital letter. Certain built-in identifiers are exempt
     * from this rule. These identifiers are:
     *   - `Array`
     *   - `Boolean`
     *   - `Date`
     *   - `Error`
     *   - `Function`
     *   - `Number`
     *   - `Object`
     *   - `RegExp`
     *   - `String`
     *   - `Symbol`
     *
     * @property {object} options
     *                            - `newIsCap`                 {bool}  Require all `new` operators to be called with
     *                                                                 uppercase-started functions;
     *                                                                 default: true
     *                            - `newIsCapExceptions`       {array} Allows specified lowercase-started function
     *                                                                 names to be called with the `new` operator
     *                            - `newIsCapExceptionPattern` {regex} Allows any lowercase-started function names that
     *                                                                 match the specified regex pattern to be called
     *                                                                 with the `new` operator
     *                            - `capIsNew`                 {bool}  Require all uppercase-started functions to be
     *                                                                 called with `new` operators;
     *                                                                 default: true
     *                            - `capIsNewExceptions`       {array} Allows specified uppercase-started function
     *                                                                 names to be called without the `new` operator
     *                            - `capIsNewExceptionPattern` {regex} Allows any uppercase-started function names that
     *                                                                 match the specified regex pattern to be called
     *                                                                 without the `new` operator
     *                            - `properties`               {bool}  Enable/Disable checks on object properties;
     *                                                                 default: true
     */
    'new-cap': [
        'error',
        {
            'newIsCap': true,
            'capIsNew': false,
            'properties': true,
        },
    ],

    /**
     * This rule can enforce or disallow parentheses when invoking a constructor with no arguments using the `new`
     * keyword.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `always` Enforces parentheses after new constructor with no arguments
     *                           - `never`  Enforces no parentheses after a new constructor with no arguments
     *                           default: `always`
     */
    'new-parens': [
        'error',
        'always',
    ],

    /**
     * This rule requires a newline after each call in a method chain or deep member access. Computed property accesses
     * such as `instance[something]` are excluded.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreChainWithDepth` {int} Allows chains up to a specified depth;
     *                                                           default: 2
     */
    'newline-per-chained-call': [
        'error',
        {
            'ignoreChainWithDepth': 2,
        },
    ],

    /**
     * This rule disallows `Array` constructors.
     */
    'no-array-constructor': 'error',

    /**
     * This rule disallows bitwise operators.
     *
     * @property {object} options
     *                            - `allow`     {array} Allow a list of bitwise operators to be used as exceptions
     *                            - `int32Hint` {bool}  Allow the use of bitwise OR in `|0` pattern for type casting
     */
    'no-bitwise': 'off',

    /**
     * This rule disallows continue statements.
     */
    'no-continue': 'off',

    /**
     * This rule disallows comments on the same line as code.
     */
    'no-inline-comments': 'error',

    /**
     * This rule disallows `if` statements as the only statement in `else` blocks.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-lonely-if': 'off',

    /**
     * This rule checks `BinaryExpression`, `LogicalExpression`, and `ConditionalExpression`.
     *
     * @property {object} options
     *                            - `groups`              {array} Specifies operator groups to be checked. The `groups`
     *                                                            option is a list of groups, and a group is a list of
     *                                                            binary operators. Default operator groups are defined
     *                                                            as arithmetic, bitwise, comparison, logical, and
     *                                                            relational operators. Note: Ternary operator (`?:`
     *                                                            can be part of any group and by default is allowed to
     *                                                            be mixed with other operators
     *                            - `allowSamePrecedence` {bool}  Specifies whether to allow mixed operators if they
     *                                                            are of equal precedence;
     *                                                            default: true
     */
    'no-mixed-operators': [
        'error',
        {
            'groups': [
                ['==', '!=', '===', '!==', '>', '>=', '<', '<='],
                ['&&', '||'],
                ['in', 'instanceof'],
            ],
            'allowSamePrecedence': true,
        },
    ],

    /**
     * This rule disallows mixed spaces and tabs for indentation.
     *
     * @property {string} option
     *                           - `smart-tabs` Allows mixed tabs and spaces when the spaces are used for alignment
     */
    'no-mixed-spaces-and-tabs': 'error',

    /**
     * This rule disallows using multiple assignments within a single statement.
     */
    'no-multi-assign': 'off',

    /**
     * This rule aims to reduce the scrolling required when reading through your code. It will warn when the maximum
     * amount of empty lines has been exceeded.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `max`    {int} Enforces a maximum number of consecutive empty lines;
     *                                             default: 2
     *                            - `maxEOF` {int} Enforces a maximum number of consecutive empty lines at the end of
     *                                             files
     *                            - `maxBOF` {int} Enforces a maximum number of consecutive empty lines at the
     *                                             beginning of files
     */
    'no-multiple-empty-lines': [
        'error',
        {
            'max': 1,
            'maxEOF': 1,
        },
    ],

    /**
     * This rule disallows negated conditions in either of the following:
     *   - `if` statements which have an `else` branch
     *   - ternary expressions
     */
    'no-negated-condition': 'off',

    /**
     * This rule disallows nested ternary expressions.
     */
    'no-nested-ternary': 'off',

    /**
     * This rule disallows `Object` constructors.
     */
    'no-new-object': 'error',

    /**
     * This rule disallows the unary operators `++` and `--`.
     *
     * @property {object} options
     *                            - `allowForLoopAfterthoughts` {bool} Allows unary operators `++` and `--` in the
     *                                                                 afterthought (final expression) of a `for` loop
     */
    'no-plusplus': 'off',

    /**
     * This rule disallows specified (that is, user-defined) syntax.
     *
     * @property {array|object} astSelectors List of strings that should not be allowed
     */
    'no-restricted-syntax': 'off',

    /**
     * This rule looks for tabs anywhere inside a file: code, comments or anything else.
     *
     * @property {object} options
     *                            - `allowIndentationTabs` {bool} Ignore tabs used for indentation;
     *                                                            default: false
     */
    'no-tabs': 'error',

    /**
     * This rule disallows ternary operators.
     */
    'no-ternary': 'off',

    /**
     * This rule disallows trailing whitespace (spaces, tabs, and other Unicode whitespace characters) at the end of
     * lines.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `skipBlankLines` {bool} Ignore trailing whitespace on empty lines;
     *                                                      default: false
     *                            - `ignoreComments` {bool} Ignore trailing whitespace in comment blocks;
     *                                                      default: false
     */
    'no-trailing-spaces': [
        'error',
        {
            'skipBlankLines': false,
            'ignoreComments': false,
        },
    ],

    /**
     * This rule disallows dangling underscores in identifiers.
     *
     * @property {object} options
     *                            - `allow`                     {array} Allows specified identifiers to have dangling
     *                                                                  underscores;
     *                                                                  default: []
     *                            - `allowAfterThis`            {bool}  Allow dangling underscores in members of the
     *                                                                  `this` object;
     *                                                                  default: false
     *                            - `allowAfterSuper`           {bool}  Allow dangling underscores in members of the
     *                                                                  `super` object;
     *                                                                  default: false
     *                            - `allowAfterThisConstructor` {bool}  Allow dangling underscores in members of the
     *                                                                  `this.constructor` object;
     *                                                                  default: false
     *                            - `enforceInMethodNames`      {bool}  Disallow dangling underscores in method names;
     *                                                                  default: false
     */
    'no-underscore-dangle': 'off',

    /**
     * This rule disallow ternary operators when simpler alternatives exist.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `defaultAssignment` Allow the conditional expression as a default assignment
     *                                                  pattern;
     *                                                  default: true
     */
    'no-unneeded-ternary': [
        'error',
        {
            'defaultAssignment': false,
        },
    ],

    /**
     * This rule disallows whitespace around the dot or before the opening bracket before properties of objects if they
     * are on the same line. This rule allows whitespace when the object and property are on separate lines, as it is
     * common to add newlines to longer chains of properties.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-whitespace-before-property': 'error',

    /**
     * This rule aims to enforce a consistent location for single-line statements.
     *
     * Note that this rule does not enforce the usage of single-line statements in general.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} location
     *                              - `beside` Disallows a newline before a single-line statement
     *                              - `below`  Requires a newline before a single-line statement
     *                              - `any`    Does not enforce the position of a single-line statement
     * @property {object} overrides Used to specify a location for particular statements that override the default
     */
    'nonblock-statement-body-position': 'off',

    /**
     * This rule enforces consistent line breaks inside braces of object literals or destructuring assignments.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`                            Requires line breaks inside braces
     *                                   - `never`                             Disallows line breaks inside braces
     *                                   - `multiline`         {bool}          Require line breaks if there are line
     *                                                                         breaks inside properties or between
     *                                                                         properties
     *                                   - `minProperties`     {int}           Require line breaks if the number of
     *                                                                         properties is at least the given integer
     *                                   - `consistent`        {bool}          Requires that either both curly braces,
     *                                                                         or neither, directly enclose new lines;
     *                                                                         default: true
     *                                   - `ObjectExpression`  {string|object} Configuration for object literals
     *                                   - `ObjectPattern`     {string|object} Configuration for object patterns of
     *                                                                         destructuring assignments
     *                                   - `ImportDeclaration` {string|object} Configuration for named imports
     *                                   - `ExportDeclaration` {string|object} Configuration for named exports
     */
    'object-curly-newline': [
        'error',
        {
            'multiline': true,
            'consistent': true,
        },
    ],

    /**
     * This rule enforces consistent spacing inside braces of object literals, destructuring assignments, and import/
     * export specifiers.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} spacing
     *                            - `always` Requires spacing inside of braces (except `{}`)
     *                            - `never`  Disallows spacing inside of braces;
     *                            default: `never`
     * @property {object} options
     *                            - `arraysInObjects`  {bool} Require spacing inside of braces of objects beginning
     *                                                        and/or ending with an array element
     *                            - `objectsInObjects` {bool} Require spacing inside of braces of objects beginning
     *                                                        and/or ending with an object element
     */
    'object-curly-spacing': [
        'error',
        'always',
    ],

    /**
     * This rule makes it possible to ensure, as some style guides require, that property specifications appear on
     * separate lines for better readability.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} exceptions
     *                               - `allowAllPropertiesOnSameLine` {bool} Allow properties to be on the same line as
     *                                                                       long as all are on the same line
     */
    'object-property-newline': [
        'error',
        {
            'allowAllPropertiesOnSameLine': true,
        },
    ],

    /**
     * This rule enforces variables to be declared either together or separately per function (for `var`) or block (for
     * `let` and `const`) scope.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`                    Requires one variable declaration per scope
     *                                   - `never`                     Requires multiple variable declarations per
     *                                                                 scope
     *                                   - `consecutive`               Allows multiple variable declarations per scope
     *                                                                 but requires consecutive variable declarations
     *                                                                 to be combined into a single declaration
     *                                   - `var`              {string} See `always`/`never`/`consecutive` - for `var`
     *                                   - `let`              {string} See `always`/`never`/`consecutive` - for `let`
     *                                   - `const`            {string} See `always`/`never`/`consecutive` - for `const`
     *                                   - `separateRequires` {bool}   Enforce `requires` to be separate from
     *                                                                 declarations
     *                                   - `initialized`      {string} See `always`/`never`/`consecutive` - for
     *                                                                 initialized variables
     *                                   - `uninitialized`    {string} See `always`/`never`/`consecutive` - for
     *                                                                 uninitialized variables
     *                                   default: `always`
     */
    'one-var': [
        'error',
        {
            'initialized': 'never',
        },
    ],

    /**
     * This rule enforces a consistent newlines around variable declarations. This rule ignores variable declarations
     * inside `for` loop conditionals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `initializations` Enforces a newline around variable initializations
     *                           - `always`          Enforces a newline around variable declarations
     *                           default: `initializations`
     */
    'one-var-declaration-per-line': 'off',

    /**
     * This rule requires or disallows assignment operator shorthand where possible.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} option
     *                           - `always` Requires assignment operator shorthand where possible
     *                           - `never`  Disallows assignment operator shorthand
     */
    'operator-assignment': 'off',

    /**
     * This rule enforces a consistent linebreak style for operators.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} options
     *                              - `after`  Requires linebreaks to be placed after the operator
     *                              - `before` Requires linebreaks to be placed before the operator
     *                              - `none`   Disallows linebreaks on either side of the operator
     * @property {object} overrides
     *                              - `overrides` {object} Overrides the global setting for specified operators
     */
    'operator-linebreak': [
        'error',
        'after',
        {
            'overrides': {
                '?': 'before',
                ':': 'before',
                '|>': 'before',
            },
        },
    ],

    /**
     * This rule enforces consistent empty line padding within blocks.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                      - `always`            Require empty lines at the beginning and ending of
     *                                                            block statements and classes
     *                                      - `never`             Disallows empty lines at the beginning and ending of
     *                                                            block statements and classes
     *                                      - `blocks`   {string} Require/Disallow padding within block statements
     *                                      - `classes`  {string} Require/Disallow padding within classes
     *                                      - `switches` {string} Require/Disallow padding within `switch` statements
     *                                      default: `always`
     * @property {object}        exceptions
     *                                     - `allowSingleLineBlocks` {bool} Allow single-line blocks
     */
    'padded-blocks': [
        'error',
        {
            'blocks': 'never',
            'classes': 'never',
            'switches': 'never',
        },
    ],

    /**
     * This rule does nothing if no configurations are provided.
     *
     * A configuration is an object which has 3 properties: `blankLine`, `prev` and `next`. For example:
     * `{ blankLine: "always", prev: "var", next: "return" }` means "one or more blank lines are required between a
     * variable declaration and a `return` statement." You can supply any number of configurations. If a statement pair
     * matches multiple configurations, the last matched configuration will be used.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @todo set this properly
     */
    'padding-line-between-statements': 'off',

    /**
     * This rule disallows calls to `Math.pow` and suggests using the `**` operator instead.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'prefer-exponentiation-operator': 'off',

    /**
     * This rule disallows using `Object.assign` with an object literal as the first argument and requires using the
     * object spread syntax instead.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'prefer-object-spread': 'off',

    /**
     * This rule requires quotes around object literal property names.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always`               Requires quotes around all object literal property names
     *                            - `as-needed`            Disallows quotes around object literal property names that
     *                                                     are not strictly required
     *                            - `consistent`           Enforces a consistent quote style; in a given object, either
     *                                                     all of the properties should be quoted, or none of the
     *                                                     properties should be quoted
     *                            - `consistent-as-needed` Requires quotes around literal property names if any name
     *                                                     strictly requires quotes, otherwise disallows quotes around
     *                                                     object property names
     *                            default: `always`
     * @property {object} options
     *                            - `keywords`    {bool} Require quotes around language keywords used as object
     *                                                   property names (only applies when using `as-needed` or
     *                                                   `consistent-as-needed`)
     *                                                   default: false
     *                            - `unnecessary` {bool} Disallows quotes around object literal property names that are
     *                                                   not strictly required (only applies when using `as-needed`)
     *                                                   default: true
     *                            - `numbers`     {bool} Requires quotes round numbers used as object property names
     *                                                   (only applies when using `as-needed`)
     *                                                   default: false
     */
    'quote-props': [
        'error',
        'consistent-as-needed',
        {
            'keywords': false,
            'unnecessary': true,
            'numbers': false,
        },
    ],

    /**
     * This rule enforces the consistent use of either backticks, double, or single quotes.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} type
     *                            - `double`   Requires the use of double quotes wherever possible
     *                            - `single`   Requires the use of single quotes wherever possible
     *                            - `backtick` Requires the use of backticks wherever possible
     *                            default: `double`
     * @property {object} options
     *                            - `avoidEscape`          {bool} Allow strings to use single-quotes or double-quotes
     *                                                            so long as the string contains a quote that would
     *                                                            have to be escaped otherwise
     *                                                            default: false
     *                            - `allowTemplateLiterals {bool} Allow strings to use backticks
     *                                                            default: false
     */
    'quotes': [
        'error',
        'single',
        {
            'avoidEscape': true,
            'allowTemplateLiterals': false,
        },
    ],

    /**
     * This rule enforces consistent use of semicolons.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` Requires semicolons at the end of statements
     *                            - `never`  Disallows semicolons as the end of statements (except to disambiguate
     *                                       statements beginning with `[`, `(`, `/`, `+`, or `-`)
     *                            default: `always`
     * @property {object} options
     *                            - `omitLastInOneLineBlock`            {bool}   Ignore the last semicolon in a block
     *                                                                           in which its braces (and therefore the
     *                                                                           content of the block) are in the same
     *                                                                           line;
     *                                                                           only used when `always`;
     *                                                                           default: false
     *                            - ` beforeStatementContinuationChars` {string}
     *                                                                           - `any`    Ignore semicolons (or
     *                                                                                      lacking semicolon) at the
     *                                                                                      end of statements if the
     *                                                                                      next line starts with `[`,
     *                                                                                      `(`, `/`, `+`, or `-`.
     *                                                                           - `always` Require semicolons at the
     *                                                                                      end of statements if the
     *                                                                                      next line starts with `[`,
     *                                                                                      `(`, `/`, `+`, or `-`.
     *                                                                           - `never`  Disallows semicolons as the
     *                                                                                      end of statements if it
     *                                                                                      doesn't make ASI hazard
     *                                                                                      even if the next line
     *                                                                                      starts with `[`, `(`, `/`,
     *                                                                                      `+`, or `-`.
     *                                                                           only used when `never`;
     *                                                                           default: `any`
     */
    'semi': [
        'error',
        'always',
        {
            'omitLastInOneLineBlock': false,
        },
    ],

    /**
     * This rule aims to enforce spacing around a semicolon. This rule prevents the use of spaces before a semicolon in
     * expressions.
     *
     * This rule doesn't check spacing in the following cases:
     *   - the spacing after the semicolon if it is the first token in the line
     *   - the spacing before the semicolon if it is after an opening parenthesis (`(` or `{`), or the spacing after
     *     the semicolon if it is before a closing parenthesis (`)` or `}`). That spacing is checked by
     *     `space-in-parens` or `block-spacing`
     *   - the spacing around the semicolon in a for loop with an empty condition (`for(;;)`)
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`  {bool} Allow spacing after semicolons
     *                                              default: true
     *                            - `before` {bool} Allow spacing before semicolons
     *                                              default: false
     */
    'semi-spacing': [
        'error',
        {
            'after': true,
            'before': false,
        },
    ],

    /**
     * This rule reports line terminators around semicolons.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} location
     *                             - `first` Enforces that semicolons are at the beginning of statements; semicolons of
     *                                       `for` loop heads (`for(a;b;c){}` should be at the end of lines even if you
     *                                       use this option
     *                             - `last`  Enforces that semicolons are at the end of statements
     *                             default: `last`
     */
    'semi-style': [
        'error',
        'last',
    ],

    /**
     * This rule checks all property definitions of object expressions and verifies that all variables are sorted
     * alphabetically.
     *
     * @property {string} direction
     *                              - `asc`  Enforce properties to be in ascending order
     *                              - `desc` Enforce properties to be in descending order
     *                              default: `asc`
     * @property {object} options
     *                              - `caseSensitive` {bool} Enforce properties to be in case-sensitive order;
     *                                                       default: true
     *                              - `minKeys`       {int}  Specifies the minimum number of keys that an object should
     *                                                       have in order for the object's unsorted keys to produce an
     *                                                       error;
     *                                                       default: 2
     *                              - `natural`       {bool} Enforce properties to be in natural order. Natural Order
     *                                                       compares strings containing combination of letters and
     *                                                       numbers in a way a human being would sort;
     *                                                       default: false
     */
    'sort-keys': [
        'error',
        'asc',
        {
            'caseSensitive': true,
            'minKeys': 2,
            'natural': true,
        },
    ],

    /**
     * This rule checks all variable declaration blocks and verifies that all variables are sorted alphabetically.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreCase` {bool} Ignore the case-sensitivity of the variables order;
     *                                                  default: false
     */
    'sort-vars': [
        'error',
        {
            'ignoreCase': false,
        }
    ],

    /**
     * This rule will enforce consistency of spacing before blocks. It is only applied on blocks that don’t begin on a
     * new line.
     *   - this rule ignores spacing which is between `=>` and a block
     *   - this rule ignores spacing which is between a keyword and a block
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always`             Blocks must always have at least one preceding space
     *                                   - `never`              Blocks should never have any preceding space
     *                                   - `classes`   {string} Spacing specifically for classes
     *                                   - `functions` {string} Spacing specifically for functions
     *                                   - `keywords`  {string} Spacing specifically for keywords
     *                                   default: `always`
     */
    'space-before-blocks': [
        'error',
        {
            'classes': 'always',
            'functions': 'always',
            'keywords': 'always',
        },
    ],

    /**
     * This rule aims to enforce consistent spacing before function parentheses and as such, will warn whenever
     * whitespace doesn't match the preferences specified.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string|object} options
     *                                   - `always` Require a space followed by the `(` of arguments
     *                                   - `never`  Disallow any space followed by the `(` of arguments
     *                                   - `anonymous`  {string} Anonymous function expressions (e.g.:
     *                                                           `function () {}`);
     *                                                           default: `always`
     *                                   - `asyncArrow` {string} Async arrow function expressions e.g.:
     *                                                           `async () => {}`);
     *                                                           default: `always`
     *                                   - `named`      {string} Named function expressions (e.g.:
     *                                                           `function foo () {}`);
     *                                                           default: `always`
     *                                   default: `always`
     */
    'space-before-function-paren': [
        'error',
        {
            'anonymous': 'never',
            'asyncArrow': 'always',
            'named': 'never',
        },
    ],

    /**
     * This rule will enforce consistent spacing directly inside of parentheses, by disallowing or requiring one or
     * more spaces to the right of `(` and to the left of `)`.
     *
     * As long as you do not explicitly disallow empty parentheses using the `"empty"` exception, `()` will be allowed.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} allow
     *                            - `always` Enforce a space inside of parentheses
     *                            - `never`  Enforces zero spaces inside of parentheses
     *                            default: `never`
     * @property {object} options
     *                            - `exceptions` {array} Array of exceptions for the above option
     */
    'space-in-parens': [
        'error',
        'never',
        {
            'exceptions': [],
        },
    ],

    /**
     * This rule is aimed at ensuring there are spaces around infix operators.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `int32Hint` {bool} Allow write `a|0` without space
     *                                                 default: false
     */
    'space-infix-ops': [
        'error',
        {
            'int32Hint': false,
        },
    ],

    /**
     * This rule enforces consistency regarding the spaces after `words` unary operators and after/before `nonwords`
     * unary operators.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `words`     {bool}   Applies to unary word operators such as: `new`, `delete`,
     *                                                   `typeof`, `void`, and `yield`
     *                            - `nonwords`  {bool}   Applies to unary operators such as: `-`, `+`, `--`, `++`, `!`,
     *                                                   and `!!`
     *                            - `overrides` {object} Specifies overwriting usage of spacing for each operator,
     *                                                   word, or non-word
     */
    'space-unary-ops': [
        'error',
        {
            'words': true,
            'nonwords': false,
            'overrides': {},
        },
    ],

    /**
     * This rule will enforce consistency of spacing after the start of a comment `//` or `/*`. It also provides
     * several exceptions for various documentation styles.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` The start of the comment (`//` or `/*`) must be followed by at least one
     *                                       whitespace
     *                            - `never`  There should be no whitespace following
     * @property {object} options
     *                            - (comment type) {object}
     *                                                      - `balanced`   {bool}  Specify if inline block comments
     *                                                                             should have balanced spacing;
     *                                                                             only used for block comments;
     *                                                                             default: false
     *                                                      - `markers`    {array} Array of string patterns which are
     *                                                                             considered markers for docblock-
     *                                                                             style comments, such as an
     *                                                                             additional `/`, used to denote
     *                                                                             documentation read by doxygen,
     *                                                                             vsdoc, etc. which must have
     *                                                                             additional characters
     *                                                      - `exceptions` {array} Array of string patterns which are
     *                                                                             considered exceptions to the rule
     */
    'spaced-comment': [
        'error',
        'always',
        {
            'line': {
                'markers': [
                    '*package',
                    '!',
                    '/',
                    ',',
                    '=',
                ],
            },
            'block': {
                'balanced': true,
                'markers': [
                    '*package',
                    '!',
                    ',',
                    ':',
                    '::',
                    'flow-include',
                ],
                'exceptions': [
                    '*',
                ],
            },
        },
    ],

    /**
     * This rule controls spacing around colons of `case` and `default` clauses in `switch` statements. This rule does
     * the check only if the consecutive tokens exist on the same line.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`  {bool} Require one or more spaces after colons
     *                                              default: true
     *                            - `before` {bool} Require one or more spaces before colons
     *                                              default: false
     */
    'switch-colon-spacing': [
        'error',
        {
            'after': true,
            'before': false,
        },
    ],

    /**
     * This rule aims to maintain consistency around the spacing between template tag functions and their template
     * literals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` Requires one or more spaces between a tag function and its template
     *                                       literal
     *                            - `never`  Disallows spaces between a tag function and its template literal
     *                            default: `never`
     */
    'template-tag-spacing': [
        'error',
        'never',
    ],

    /**
     * If the `"always"` option is used, this rule requires that files always begin with the Unicode BOM character
     * U+FEFF. If `"never"` is used, files must never begin with U+FEFF.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` Files must begin with the Unicode BOM
     *                            - `never`  Files must not begin with the Unicode BOM
     *                            default: `never`
     */
    'unicode-bom': [
        'error',
        'never',
    ],


    /**
     * This is used to disambiguate the slash operator and facilitates more readable code.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'wrap-regex': 'error',
};

/**
 * These rules relate to ES6, also known as ES2015.
 *
 * @type {object}
 */
let ESLintECMAScript6 = {
    /**
     * This rule can enforce or disallow the use of braces around arrow function body.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always`    Enforces braces around the function body
     *                            - `as-needed` Enforces no braces where they can be omitted
     *                            - `never`     Enforces no braces around the function body (constrains arrow functions
     *                                          to the role of returning an expression)
     *                            default: `as-needed`
     * @property {object} options
     *                            - `requireReturnForObjectLiteral` {bool} Require braces and an explicit return for
     *                                                                     object literals;
     *                                                                     only applicable with the `as-needed` option
     *                                                                     default: false
     */
    'arrow-body-style': [
        'error',
        'as-needed',
        {
            'requireReturnForObjectLiteral': true,
        },
    ],

    /**
     * This rule enforces parentheses around arrow function parameters regardless of arity.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always`    Require parentheses around arguments in all cases
     *                            - `as-needed` Enforces no braces where they can be omitted
     *                            default: `always`
     * @property {object} options
     *                            - `requireForBlockBody` {bool} Modifies the `as-needed` rule in order to require
     *                                                           parentheses if the function body is in an instructions
     *                                                           block (surrounded by braces);
     *                                                           default: false
     */
    'arrow-parens': [
        'error',
        'as-needed',
        {
            'requireForBlockBody': true,
        },
    ],

    /**
     * This rule normalize style of spacing before/after an arrow function's arrow (`=>`).
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`  {bool} Require one or more spaces after the arrow;
     *                                              default: true
     *                            - `before` {bool} Require one or more spaces before the arrow;
     *                                              default: true
     */
    'arrow-spacing': [
        'error',
        {
            'after': true,
            'before': true,
        },
    ],

    /**
     * This rule is aimed to flag invalid/missing `super()` calls.
     */
    'constructor-super': 'error',

    /**
     * This rule aims to enforce spacing around the `*` of generator functions.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`     {bool}   Enforce spacing between the `*` and the `function` keyword;
     *                                                   default: false
     *                            - `before`    {bool}   Enforces spacing between the `*` and the function name (or the
     *                                                   opening parenthesis for anonymous generator functions;
     *                                                   default: true
     *                            - `named`     {object} Provides overrides for named functions
     *                            - `anonymous` {object} Provides overrides for anonymous functions
     *                            - `method`    {object} Provides overrides for class methods or property function
     *                                                   shorthand
     */
    'generator-star-spacing': [
        'error',
        {
            'after': true,
            'before': true,
        },
    ],

    /**
     * This rule is aimed to flag modifying variables of class declarations.
     */
    'no-class-assign': 'error',

    /**
     * This rule disallows arrow functions where they could be confused with comparisons.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `allowParens` {bool} Relax the rule and accept parenthesis as a valid "confusion-
     *                                                   preventing" syntax;
     *                                                   default: true
     */
    'no-confusing-arrow': 'off',

    /**
     * This rule is aimed to flag modifying variables that are declared using `const` keyword.
     */
    'no-const-assign': 'error',

    /**
     * This rule is aimed to flag the use of duplicate names in class members.
     */
    'no-dupe-class-members': 'error',

    /**
     * This rule requires that all imports from a single module exists in a single `import` statement.
     *
     * @property {object} options
     *                            - `includeExports` {bool} If re-exporting from an imported module, imports should be
     *                                                      added to the `import`-statement, and exported directly;
     *                                                      default: false
     */
    'no-duplicate-imports': 'off',

    /**
     * This rule is aimed at preventing the accidental calling of `Symbol` with the `new` operator.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-new-symbol': 'error',

    /**
     * This rule disallows specified names from being used as exported names.
     *
     * @property {object} options
     *                            - `restrictedNamedExports` {array} Array of names to be restricted
     */
    'no-restricted-exports': 'off',

    /**
     * This rule allows you to specify imports that you don't want to use in your application.
     *
     * @property {object} options
     *                            - `paths`    {array} Array of imports that should be restricted
     *                            - `patterns` {array} Array of gitignore-style patterns to be restricted
     */
    'no-restricted-imports': 'off',

    /**
     * This rule is aimed to flag `this`/`super` keywords before `super()` callings.
     */
    'no-this-before-super': 'error',

    /**
     * This rule disallows unnecessary usage of computed property keys.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `enforceForClassMembers` {bool} Additionally apply this rule to class members;
     *                                                              default: false
     */
    'no-useless-computed-key': [
        'error',
        {
            'enforceForClassMembers': false,
        },
    ],

    /**
     * This rule flags class constructors that can be safely removed without changing how the class works.
     */
    'no-useless-constructor': 'error',

    /**
     * This rule disallows the renaming of import, export, and destructured assignments to the same name.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreDestructuring` {bool} Do not check destructuring assignments;
     *                                                           default: false
     *                            - `ignoreExport`        {bool} Do not check exports;
     *                                                           default: false
     *                            - `ignoreImport`        {bool} Do not check imports;
     *                                                           default: false
     */
    'no-useless-rename': [
        'error',
        {
            'ignoreDestructuring': false,
            'ignoreExport': false,
            'ignoreImport': false,
        },
    ],

    /**
     * This rule is aimed at discouraging the use of `var` and encouraging the use of `const` or `let` instead.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'no-var': 'error',

    /**
     * This rule enforces the use of the shorthand syntax. This applies to all methods (including generators) defined
     * in object literals and any properties defined where the key name matches name of the assigned variable.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always`               Expects that the shorthand will be used whenever possible
     *                            - `methods`              Ensures the method shorthand is used (also applies to
     *                                                     generators)
     *                            - `properties`           Ensures the property shorthand is used (where the key and
     *                                                     variable name match)
     *                            - `never`                Ensures that no property or method shorthand is used in any
     *                                                     object literal
     *                            - `consistent`           Ensures that either all shorthand or all long-form will be
     *                                                     used in an object literal
     *                            - `consistent-as-needed` Ensures that either all shorthand or all long-form will be
     *                                                     used in an object literal, but ensures all shorthand
     *                                                     whenever possible
     *                            default: `always`
     * @property {object} options
     *                            - `avoidQuotes`               {bool} Indicates that long-form syntax is preferred
     *                                                                 whenever the object key is a string literal;
     *                                                                 note that this option can only be enabled when
     *                                                                 the string option is set to `always`, `methods`,
     *                                                                 or `properties`;
     *                                                                 default: false
     *                            - `ignoreConstructors`        {bool} Prevent the rule from reporting errors for
     *                                                                 constructor functions;
     *                                                                 note that this option can only be enabled when
     *                                                                 the string option is set to `always` or
     *                                                                 `methods`;
     *                                                                 default: false
     *                            - `avoidExplicitReturnArrows` {bool} Indicates that methods are preferred over
     *                                                                 explicit-return arrow functions for function
     *                                                                 properties;
     *                                                                 note that this option can only be enabled when
     *                                                                 the string option is set to `always` or
     *                                                                 `methods`;
     *                                                                 default: false
     */
    'object-shorthand': 'off',

    /**
     * This rule locates function expressions used as callbacks or function arguments. An error will be produced for
     * any that could be replaced by an arrow function without changing the result.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `allowNamedFunctions` {bool} Allow the use of named functions as callbacks or
     *                                                           function arguments;
     *                                                           default: false
     *                            - `allowUnboundThis`    {bool} Allow function expressions containing `this` to be
     *                                                           used as callbacks, as long as the function in question
     *                                                           has not been explicitly bound;
     *                                                           default: true
     */
    'prefer-arrow-callback': 'off',

    /**
     * This rule is aimed at flagging variables that are declared using `let` keyword, but never reassigned after the
     * initial assignment.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `destructuring`          {string} The kind of the way to address variables in
     *                                                                destructuring
     *                                                                - `any` If any variables in destructuring should
     *                                                                        be `const`
     *                                                                - `all` If all variables in destructuring should
     *                                                                        be `const`
     *                                                                default: `any`
     *                            - `ignoreReadBeforeAssign` {bool}   Ignore variables that are read between the
     *                                                                declaration and the first assignment;
     *                                                                default: false
     */
    'prefer-const': [
        'error',
        {
            'destructuring': 'all',
            'ignoreReadBeforeAssign': false,
        },
    ],

    /**
     * Prefer destructuring from arrays and objects.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} types
     *                            - `array`  {bool} Turn on/off the destructuring requirement for arrays;
     *                                              default: true
     *                            - `object` {bool} Turn on/off the destructuring requirement for objects;
     *                                              default: true
     * @property {object} options
     *                            - `enforceForRenamedProperties` {bool} Determine whether the `object` destructuring
     *                                                                   applies to renamed variables;
     *                                                                   default: false
     */
    'prefer-destructuring': 'off',

    /**
     * This rule disallows calls to `parseInt()` or `Number.parseInt()` if called with two arguments: a string; and a
     * radix option of 2 (binary), 8 (octal), or 16 (hexadecimal).
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'prefer-numeric-literals': 'off',

    /**
     * This rule is aimed to flag usage of `arguments` variables.
     */
    'prefer-rest-params': 'off',

    /**
     * This rule is aimed to flag usage of `Function.prototype.apply()` in situations where spread syntax could be used
     * instead.
     */
    'prefer-spread': 'off',

    /**
     * This rule is aimed to flag usage of `+` operators with strings.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     */
    'prefer-template': 'off',

    /**
     * This rule generates warnings for generator functions that do not have the `yield` keyword.
     */
    'require-yield': 'off',

    /**
     * This rule aims to enforce consistent spacing between rest and spread operators and their expressions. The rule
     * also supports object rest and spread properties in ES2018.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` Whitespace is required between spread operators and their expressions
     *                            - `never`  Whitespace is not allowed between spread operators and their expressions
     *                            default: `never`
     */
    'rest-spread-spacing': [
        'error',
        'never',
    ],

    /**
     * This rule checks all import declarations and verifies that all imports are first sorted by the used member
     * syntax and then alphabetically by the first member or alias name.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `ignoreCase`            {bool}  Ignore the case-sensitivity of the imports local
     *                                                              name;
     *                                                              default: false
     *                            - `ignoreDeclarationSort` {bool}  Ignore the sorting of import declaration
     *                                                              statements;
     *                                                              default: false
     *                            - `ignoreMemberSort`      {bool}  Ignore the member sorting within a `multiple`
     *                                                              member import declaration;
     *                                                              default: false
     *                            - `memberSyntaxSortOrder` {array} There are four different styles; all items must be
     *                                                              present in the array, but the order can be
     *                                                              customized:
     *                                                              - `none`     Import module without exported
     *                                                                           bindings
     *                                                              - `all`      Import all members provided by
     *                                                                           exported bindings
     *                                                              - `multiple` Import multiple members
     *                                                              - `single`   Import single member
     *                                                              default: ['none', 'all', 'multiple', 'single']
     */
    'sort-imports': 'off',

    /**
     * This rules requires a description when creating symbols.
     */
    'symbol-description': 'error',

    /**
     * This rule aims to maintain consistency around the spacing inside of template literals.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {string} require
     *                            - `always` Requires one or more spaces inside of the curly brace pair
     *                            - `never`  Disallows spaces inside of the curly brace pair
     *                            default: `never`
     */
    'template-curly-spacing': [
        'error',
        'never',
    ],

    /**
     * This rule enforces spacing around the `*` in `yield*` expressions.
     *
     * The `--fix` option on the command line can automatically fix some of the problems reported by this rule.
     *
     * @property {object} options
     *                            - `after`  {bool} Enforce spacing between the `*` and the argument;
     *                                              default: false
     *                            - `before` {bool} Enforce spacing between the `yield` and the `*`;
     *                                              default: true
     */
    'yield-star-spacing': [
        'error',
        {
            'after': true,
            'before': true,
        },
    ],
};

/**
 * Base Rules (Enabling Correct ESLint Parsing).
 *
 * @type {object}
 */
let VueBaseRules = {
    /**
     * ESLint doesn't provide any API to enhance `eslint-disable` functionality and ESLint rules cannot affect other
     * rules. But ESLint provides processors API.
     *
     * This rule sends all `eslint-disable`-like comments as errors to the post-process of the `.vue` file processor,
     * then the post-process removes all `vue/comment-directive` errors and the reported errors in disabled areas.
     */
    'vue/comment-directive': 'error',

    /**
     * This rule will find variables used in JSX and mark them as used.
     */
    'vue/jsx-uses-vars': 'error',
};

/**
 * Merge rule objects into a single object.
 *
 * @type {object}
 */
let rules = Object.assign(
    ESLintPossibleErrors,
    ESLintBestPractices,
    ESLintStrictMode,
    ESLintVariables,
    ESLintNodeJsAndCommonJs,
    ESLintStylisticIssues,
    ESLintECMAScript6,

    VueBaseRules,
);

/**
 * @type {object}
 */
module.exports = {
    env: {
        browser: true,
        es6: true,
        node: true,
    },
    overrides: [
        {
            files: [
                '*.vue',
            ],
            rules: {
                'indent': 'off',
                'sort-keys': 'off',
            },
        },
    ],
    parser: require.resolve('vue-eslint-parser'),
    parserOptions: {
        ecmaFeatures: {
            jsx: true,
        },
        ecmaVersion: 2020,
        sourceType: 'module',
    },
    plugins: [
        'vue',
    ],
    rules: rules,
};
