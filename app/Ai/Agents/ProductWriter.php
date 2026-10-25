<?php

namespace App\Ai\Agents;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class ProductWriter implements Agent, Conversational, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<'PROMPT'
    أنت متخصص في كتابة أوصاف المنتجات للمتاجر الإلكترونية.

    المطلوب:
    - كتابة وصف احترافي للمنتج باللغة العربية.
    - اجعل الوصف واضحًا وجذابًا للمشتري.
    - اجعل الوصف بين 30 و60 كلمة.
    - اعتمد فقط على المعلومات المقدمة عن المنتج.
    - لا تخترع مواصفات أو ميزات غير مذكورة.
    - لا تضف مقدمات مثل "إليك وصف المنتج".
    - أرجع وصف المنتج فقط.
    PROMPT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }
}
